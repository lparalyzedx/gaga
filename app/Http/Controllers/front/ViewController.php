<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Article;
use App\Models\Blogarticle;
use App\Models\Blogcategorie;
use App\Models\Campus;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use App\Models\HomePage;
use App\Models\Image;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\People;
use App\Models\Setting;
use App\Models\StudioArticle;
use App\Models\Studiocategorie;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ViewController extends Controller
{
    public function __construct()
    {
        view()->share('setting', Setting::find(1)->first());
        view()->share('trainings', Training::where('status', 1)->get());
    }


    public function index()
    {
        $slides = HomePage::where('status', 1)->get();
        $news = News::where('status', 1)->get();
        $setting = Setting::find(1)->first();
        return view('front.index', compact('slides', 'news', 'setting'));
    }

    public function fresh(Request $request)
    {
        $news = News::whereId($request->id)->first();
        $data['title'] = $news->title;
        $data['description'] = Str::limit($news->description);
        $data['slug'] = $news->slug;
        $data['date'] = Carbon::parse($news->created_at)->format('d.m.Y');
        return response()->json($data, 200);
    }

    public function team()
    {
        $peoples = People::where('status', 1)->get();
        return view('front.pages.team', compact('peoples'));
    }

    public function company()
    {
        $peoples = People::where('status', 1)->get();
        return view('front.pages.company', compact('peoples'));
    }

    public function team_detail($slug)
    {
        $people = People::whereSlug($slug)->first() ?? abort(404);
        return view('front.pages.team-detail', compact('people'));
    }

    public function studio()
    {
        $categories = Studiocategorie::orderBy('id', 'DESC')->withCount('articles')->get();
        $article = StudioArticle::where('status', 1)->with('images', 'category')->where('category_id', '!=', 'null')->orderBy('id', 'DESC')->first();
        return view('front.pages.studio', compact('categories', 'article'));
    }

    public function workshops()
    {
        $articles = StudioArticle::where('category_id', null)->where('status', 1)->with('images')->get();
        return view('front.pages.workshop-detail', compact('articles'));
    }

    public function workshop_detail($slug)
    {
        $article = StudioArticle::where('slug', $slug)->with('images')->whereHas('images', function ($query) {
            $query->where('type', 0);
        })->first() ?? abort(403, 'Makale bulunamadı.');

        return view('front.pages.articles', compact('article'));
    }

    public function studio_detail($slug)
    {
        $articles = Studiocategorie::where('slug', $slug)->with('articles')->whereHas('articles', function ($query) {
            $query->where('status', 1);
        })->first();
        $categories = Studiocategorie::withCount('articles')->whereHas('articles', function ($query) {
            $query->where('status', 1);
        })->orderBy('id', 'DESC')->get();

        return view('front.pages.studio-detail', compact('articles', 'categories'));
    }

    public function studio_article($categorie, $slug)
    {
        $article = StudioArticle::where('slug',$slug)->with('category','image')->whereHas('category', function ($query) use ($categorie) {
            $query->where('slug', $categorie);
        })->first();
        return view('front.pages.article', compact('article'));
    }


    public function training()
    {
        $trainings = Training::where('status', 1)->get();
        return view('front.pages.training', compact('trainings'));
    }

    public function news()
    {
        $news = News::where('status', 1)->get();
        return view('front.pages.news', compact('news'));
    }

    public function news_detail($slug)
    {
        $news = News::where('slug', $slug)->first() ?? abort(404);
        $images = NewsImage::where('news_id', $news->id)->get();
        return view('front.pages.news-detail', compact('news', 'images'));
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function campus()
    {
        $campus = Campus::find(1)->first() ?? abort(404);
        $images = Image::all();
        return view('front.pages.campus', compact('campus', 'images'));
    }

    public function firm()
    {
        return view('front.pages.firm');
    }

    public function blog()
    {
        $categories = Blogcategorie::withCount('articles')->whereHas('articles', function ($query) {
            $query->where('status', 1);
        })->get();
        $article = Blogarticle::where('status', 1)->orderBy('id', 'DESC')->with('images')->first() ?? null;
        return view('front.pages.blog', compact('categories', 'article'));
    }

    public function blog_detail($slug)
    {
        $articles = Blogcategorie::where('slug', $slug)->with('articles')->whereHas('articles', function ($query) {
            $query->where('status', 1);
        })->first() ?? abort(403, 'Kategori bulunamadı.');
        $categories = Blogcategorie::withCount('articles')->whereHas('articles', function ($query) {
            $query->where('status', 1);
        })->orderBy('id', 'DESC')->get();

        return view('front.pages.blog-detail', compact('articles', 'categories'));
    }

    public function blog_article($categorie, $slug)
    {
        
        $article = Blogarticle::where('slug',$slug)->with('category','image')->whereHas('category', function ($query) use ($categorie) {
            $query->where('slug', $categorie);
        })->first() ?? abort(403,'Makale bulunamadı.');
        return view('front.pages.article', compact('article'));
    }

    public function return (Request $request)
    {
        $request->validate(['email' => 'required|email|unique:emails,email']);

        Email::create($request->only('email'));

        return redirect()->back();
    }

    public function email(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);


        $data = array(
            'name'  =>  $request->name,
            'email' => $request->email,
            'message'   => $request->message
        );


        Mail::to('lparalyzedx3@gmail.com')->send(new ContactMail($data));
        return redirect()->back();
    }
}

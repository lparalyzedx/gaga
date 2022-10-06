<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Models\HomePage;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\People;
use App\Models\Setting;
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
        return view('front.pages.studio', compact('categories'));
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
        return view('front.pages.campus');
    }

    public function firm()
    {
        return view('front.pages.firm');
    }

    public function workshop()
    {
        return view('front.pages.workshop');
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
                  'message'   =>   $request->message
              );
      
           
          Mail::to('lparalyzedx3@gmail.com')->send(new ContactMail($data));
          return redirect()->back();
    }
}

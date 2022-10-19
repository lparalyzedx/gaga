<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogArticleCreateRequest;
use App\Http\Requests\BlogArticleUpdateRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Articleimage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\BlogArticle;
use App\Models\Blogcategorie;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = BlogArticle::orderBy('id', 'DESC')->get();
        return view('back.pages.blog.index', compact('articles'));
    }

    public function category()
    {
        $categories = Blogcategorie::orderBy('id', 'DESC')->get();
        return view('back.pages.blog.categories.index', compact('categories'));
    }

    public function category_post(CategoryRequest $request)
    {
        $categorie = new Blogcategorie();
        $categorie->name = $request->name;
        $categorie->slug = Str::slug($request->name);
        $categorie->save();
        return redirect()->back()->with('success', 'Kategori başarıyla eklendi');
    }

    public function category_delete($id)
    {
        $cataegory = Blogcategorie::whereId($id);
        $cataegory->delete();
        return redirect()->back()->with('success', 'Kategori başarıyla silindi');
    }

    public function category_fresh($id)
    {
        $article =  BlogArticle::where('category_id', $id)->with('image')->first();
        return response()->json($article, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Blogcategorie::orderBy('id', 'DESC')->get();
        return view('back.pages.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogArticleCreateRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . 'studio_' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/articles', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $article = BlogArticle::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $file_name,
        ]);

        if ($request->file('images')) {
            $sayac = count($request->file('images'));
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $path = 'public/articles';
                $fileName = Str::slug($request->title, '-') . '-studio' . $sayac . now()->format('Y-m-d_H-i-s') . '.' . $extension;
                Storage::putFileAs($path, $image, $fileName);

                Articleimage::create(
                    [
                        'article_id' => $article->id,
                        'image' => $fileName
                    ]
                );
                $sayac--;
            }
        }
        return redirect()->route('admin.blog.index')->with('success', 'Makale başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $article = BlogArticle::find($request->id) ?? abort(403, 'Makale bulunamadı.');

        if ($article->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $article->status = $status;
        $article->save();

        return response()->json([
            'status' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = BlogArticle::where('id',$id)->with('category')->first() ?? abort(404);
       // $categories = Blogcategorie::orderBy('id', 'DESC')->get();
        return view('back.pages.blog.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogArticleUpdateRequest $request, $id)
    {
        $article = BlogArticle::whereId($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . '_studio' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/articles', $file, $file_name);
            $article->update(['image' => $file_name]);
        }
        $article->update($request->only('title', 'description', 'status'));

        if ($request->file('images')) {
            $sayac = count($request->file('images'));
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $path = 'public/articles';
                $fileName = Str::slug($request->title, '-') . '-studio' . $sayac . now()->format('Y-m-d_H-i-s') . '.' . $extension;
                Storage::putFileAs($path, $image, $fileName);

                Articleimage::find($id)->update(
                    [
                        'image' => $fileName
                    ]
                );
                $sayac--;
            }
        }
        return redirect()->route('admin.blog.index')->with('success', 'Makale başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = BlogArticle::whereId($id)->first();
        $images = Articleimage::where('type',0)->where('article_id',$article->id);

        if (Storage::exists('public/articles', $article->image)) {
            Storage::delete('public/articles/' . $article->image);
        }

        $article->delete();
        $images->delete();

        return redirect()->back()->with('success', 'Makale başarıyla silindi.');
    }
}

<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Articleimage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\StudioArticle;
use App\Models\Studiocategorie;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = StudioArticle::with('category')->orderBy('id', 'DESC')->get();
        return view('back.pages.studio.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Studiocategorie::orderBy('id', 'DESC')->get();
        return view('back.pages.studio.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . 'studio_' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/articles', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $article = StudioArticle::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category_id' => $request->category_id ?? null,
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
                        'image' => $fileName,
                        'type' => 0
                    ]
                );
                $sayac--;
            }
        }
        return redirect()->route('admin.atolye.index')->with('success', 'Makale başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $article = StudioArticle::find($request->id) ?? abort(404);

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
        $article = StudioArticle::find($id) ?? abort(404);
        $categories = Studiocategorie::orderBy('id', 'DESC')->get();
        return view('back.pages.studio.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = StudioArticle::whereId($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . '_studio' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/articles', $file, $file_name);
            $article->update(['image' => $file_name]);
        }
        $article->update($request->only('title', 'description', 'status', 'category_id'));

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
        return redirect()->route('admin.atolye.index')->with('success', 'Makale başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = StudioArticle::find($id);
        $images = Articleimage::where('type',0)->where('article_id',$article->id);

        if (Storage::exists('public/articles', $article->image)) {
            Storage::delete('public/articles/' . $article->image);
        }

        $article->delete();
        $images->delete();

        return redirect()->back()->with('success', 'Makale başarıyla silindi.');
    }
}

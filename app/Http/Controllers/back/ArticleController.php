<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use App\Models\Articleimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $request->merge(['slug' => Str::slug($request->title)]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . '_' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/articles', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $article = Article::create($request->post());

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $originalName = $image->getClientOriginalName();
                $path = 'public/articles';
                $name = explode('.', $originalName);
                $fileName = Str::slug($name[0], '-') . '-is' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
                Storage::putFileAs($path, $image, $fileName);

                Articleimage::create(
                    [
                        'article_id' => $article->id,
                        'image' => $fileName
                    ]
                );
            }
        }

        if ($request->from == 'studio') {
            return redirect()->route('admin.atolye.index');
        } else {
            dd('blog');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $article = Article::find($request->id) ?? abort(403, 'Makale bulunamadı.');

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
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article= Article::find($id);
        $request->merge(['slug' => Str::slug($request->title)]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . '_' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/articles', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $article->update($request->post());


        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $originalName = $image->getClientOriginalName();
                $path = 'public/articles';
                $name = explode('.', $originalName);
                $fileName = Str::slug($name[0], '-') . '-is' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
                Storage::putFileAs($path, $image, $fileName);

                Articleimage::whereId($id)->update(
                    [
                        'image' => $fileName
                    ]
                );
            }
        }

        if ($request->from == 'studio') {
            return redirect()->route('admin.atolye.index');
        } else {
            dd('blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if (Storage::exists('public/articles', $article->image)) {
            Storage::delete('public/articles/' . $article->image);
        }
        
        $article->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(4);
        return view('back.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.news.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . '_' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/news', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $news = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $file_name,
        ]);

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $originalName = $image->getClientOriginalName();
                $path = 'public/news';
                $name = explode('.', $originalName);
                $fileName = Str::slug($name[0], '-') . '-is' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
                Storage::putFileAs($path, $image, $fileName);

                Newsimage::create(
                    [
                        'news_id' => $news->id,
                        'image' => $fileName
                    ]
                );
            }
        }
        return redirect()->route('admin.haberler.index')->with('success', 'Haber başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $news = News::find($request->id) ?? abort(403, 'Haber bulunamadı.');

        if ($news->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $news->status = $status;
        $news->save();

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
        $new = News::find($id) ?? abort(404);
        return view('back.pages.news.edit', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $news = News::whereId($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->title, '-') . '_' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/news', $file, $file_name);
            $news->update(['image' => $file_name]);
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description
        ]);

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $originalName = $image->getClientOriginalName();
                $path = 'public/news';
                $name = explode('.', $originalName);
                $fileName = Str::slug($name[0], '-') . '-is' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
                Storage::putFileAs($path, $image, $fileName);

                Newsimage::find($id)->create(
                    [
                        'image' => $fileName
                    ]
                );
            }
        }
        return redirect()->route('admin.haberler.index')->with('success', 'Haber başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $images = NewsImage::where('news_id',$id);

        if (Storage::exists('public/news', $new->image)) {
            Storage::delete('public/news/' . $new->image);
        }
        $images->delete();
        $new->delete();

        return redirect()->back()->with('success', 'Haber başarıyla silindi.');
    }
}

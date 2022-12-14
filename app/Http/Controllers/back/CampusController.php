<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampusUpdateRequest;
use App\Models\Campus;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campus = Campus::where('id', 1)->first();
        return view('back.pages.campus.index', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::orderBy('id', 'DESC')->paginate(5);
        return view('back.pages.campus.images', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['image' => 'required|image|mimes:png,jpg,jpeg'],
            [
                'image.required' => 'Resim alanı boş bırakılamaz.',
                'image.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
                'image.mimes' => 'Lütfen geçerli bir resim dosyası yükleyin.'
            ]
        );
        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $originalName = $image->getClientOriginalName();
            $path = 'public/campus';
            $name = explode('.', $originalName);
            $fileName = Str::slug($name[0], '-') . '-is' . now()->format('Y-m-d_H-i-s') . '.' . $extension;
            Storage::putFileAs($path, $image, $fileName);
            Image::create(['image' => $fileName]);
        }

        return redirect()->back()->with('success', 'Resim başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampusUpdateRequest $request, $id)
    {
       
        $campus = Campus::where('id', $id)->first() ?? abort(404);

        $campus->update($request->post());
        return redirect()->back()->with('success', 'Makale başarıyla silindi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id) ?? abort(404);

        if (Storage::exists('public/campus', $image->image)) {
            Storage::delete('public/campus/' . $image->image);
        }
        $image->delete();
        return redirect()->back()->with('success', 'Resim başarıyla silindi.');
    }
}

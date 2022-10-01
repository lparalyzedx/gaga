<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideCreateRequest;
use App\Http\Requests\SlideUpdateRequest;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides= HomePage::orderBy('id','DESC')->get();
        return view('back.pages.homepage.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.homepage.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideCreateRequest $request)
    {
        $slide= new HomePage;

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
            $extension= $file->getClientOriginalExtension();
            $file_name= Str::slug($request->title).'.'.$extension;
            Storage::putFileAs('public/slides',$file,$file_name);
            $request->merge(['image' => $file_name]);
        }

        $slide->create($request->post());
        return redirect()->route('admin.slaytlar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $slide = HomePage::find($request->id) ?? abort(403, 'Slayt bulunamadı.');

        if ($slide->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $slide->status = $status;
        $slide->save();

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
        $slide = HomePage::whereId($id)->first() ?? abort(404);;
        return view('back.pages.homepage.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideUpdateRequest $request, $id)
    {
       $slide= HomePage::find($id) ?? abort(404);;

       if($request->hasFile('image'))
       {
           $file= $request->file('image');
           $extension= $file->getClientOriginalExtension();
           $file_name= Str::slug($request->title).'.'.$extension;
           Storage::putFileAs('public/slides',$file,$file_name);
           $request->merge(['image' => $file_name]);
       }

       $slide->update($request->post());
       return redirect()->route('admin.slaytlar.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide= HomePage::find($id);
        
        if(Storage::exists('public/slides',$slide->image))
        {
            Storage::delete('public/slides/'.$slide->image);
        }
        $slide->delete();

        return redirect()->back();
    }
}

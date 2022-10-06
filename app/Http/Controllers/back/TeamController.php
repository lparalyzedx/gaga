<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeopleCreateRequest;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::orderBy('id', 'DESC')->get();
        return view('back.pages.team.index', compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.team.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeopleCreateRequest $request)
    {
        $people = new People;

        $request->merge(['slug' => Str::slug($request->name)]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->name) . '.' . $extension;
            Storage::putFileAs('public/peoples', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $people->create($request->post());

        return redirect()->route('admin.ekibimiz.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $people = People::find($request->id) ?? abort(403, 'Üye bulunamadı.');

        if ($people->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $people->status = $status;
        $people->save();

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
        $people = People::find($id)->first() ?? abort(404);

        return view('back.pages.team.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $people = People::find($id) ?? abort(404);

        $request->merge(['slug' => Str::slug($request->name)]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::slug($request->name) . '.' . $extension;
            Storage::putFileAs('public/peoples', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        $people->update($request->post());

        return redirect()->route('admin.ekibimiz.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id);

        if (Storage::exists('public/peoples', $people->image)) {
            Storage::delete('public/peoples/' . $people->image);
        }
        $people->delete();

        return redirect()->back();
    }
}

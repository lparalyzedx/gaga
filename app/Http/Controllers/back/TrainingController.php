<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingCreateRequest;
use App\Http\Requests\TrainingUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Training;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::orderBy('id', 'DESC')->get();

        return view('back.pages.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.training.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingCreateRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = Str::Slug($request->name) . '-' . now()->format('Y-m-d_H-i-s') . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/trainings', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        Training::create($request->post());

        return redirect()->route('admin.egitimler.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $training = Training::find($request->id) ?? abort(403, 'Eğitim bulunamadı.');

        if ($training->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $training->status = $status;
        $training->save();

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
        $training = Training::find($id)->first() ?? abort(404);
        return  view('back.pages.training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrainingUpdateRequest $request, $id)
    {

       
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = Str::Slug($request->name) . '-' . now()->format('Y-m-d_H-i-s') . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/trainings', $file, $file_name);
            $request->merge(['image' => $file_name]);
        }

        Training::find($id)->update($request->post()) ?? abort(404);

        return redirect()->route('admin.egitimler.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);

        if (Storage::exists('public/peoples', $training->image)) {
            Storage::delete('public/peoples/' . $training->image);
        }
        $training->delete();

        return redirect()->back();
    }
}

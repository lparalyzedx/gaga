<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting= Setting::find(1)->first();
        return view('back.pages.settings.index',compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::find(1) ?? null; 

        if ($request->hasFile('logo')) {
            $imageName = Str::slug('redteks') . '-logo.' . $request->logo->getClientOriginalExtension();
            Storage::putFileAs('public/web', $request->file('logo'), $imageName);
            $request->merge(['logo' => $imageName]);
        }

        if ($request->hasFile('favicon')) {
            $imageName = Str::slug('redteks') . '-favicon.' . $request->favicon->getClientOriginalExtension();
            Storage::putFileAs('public/web/', $request->file('favicon'), $imageName);
            $request->merge(['favicon' => $imageName]);
        }

        $setting->update($request->post());

        return redirect()->route('admin.ayarlar.index');

    }
}

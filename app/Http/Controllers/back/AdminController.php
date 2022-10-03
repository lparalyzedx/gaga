<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('front.pages.login');
    }

    public function login_post(AdminLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withErrors('E-posta veya şifre hatalı lütfen tekrar deneyin..');
        }
    }

    public function password()
    {
        return view('back.setting');
    }

    public function password_post(ResetPasswordRequest $request)
    {
        $user = User::find(Auth::id());

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('admin.password')->withErrors(['Yanlış şifre']);
        } else {
            $user->update(['password' => $request->newPassword]);
            return redirect()->route('admin.password')->with('success','Şifre başarıyla güncellendi.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        return view('back.index');
    }
    
}

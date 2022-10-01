<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function index()
    {
        return view('back.index');
    }
}

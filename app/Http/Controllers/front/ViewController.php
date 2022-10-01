<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function team()
    {
        return view('front.pages.team');
    }

    public function company()
    {
        return view('front.pages.company');
    }

    public function team_detail()
    {
        return view('front.pages.team-detail');
    }

    public function studio()
    {
        return view('front.pages.studio');
    }

    public function training()
    {
        return view('front.pages.training');
    }

    public function news()
    {
        return view('front.pages.news');
    }

    public function news_detail()
    {
        return view('front.pages.news-detail');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function campus()
    {
        return view('front.pages.campus');
    }

    public function firm()
    {
        return view('front.pages.firm');
    }

    public function workshop()
    {
        return view('front.pages.workshop');
    }
}

<!doctype html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','GAGA')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('front/dist/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('front/src/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/src/assets/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="https://cdn.tailwindcss.com">
  @yield('css')
  <style>
    .owl-stage {
      display: -webkit-box;
      display: -moz-box;
      display: -ms-box;
      display: box;
    }
    .owl-stage-outer{
      overflow: hidden;
    }
  </style>
</head>
<body>
  <div class="w-full h-full mx-auto flex-col">

    <header class="flex flex-col md:flex-row justify-center items-center md:items-start md:justify-between py-8 pl-0 md:pl-24 bg-white">
      <div class="logo mb-4"><a href="{{route('index')}}"><img src="{{asset('front/images/logo.svg')}}" alt="GAGA"></a></div>
      <div class="menu flex justify-center">
        <ul class="header-menu hidden md:flex flex-col md:flex-row items-center justify-center transition-all duration-500">
          <li><a href="{{route('index')}}" class="text-sm tracking-wider py-8 px-4 text-indigo-500">ANA SAYFA</a></li>
          <li><a href="{{route('company')}}" class="text-sm tracking-wider py-8 px-4">HAKKIMIZDA</a></li>
          <li><a href="{{route('studio')}}" class="text-sm tracking-wider py-8 px-4">ATÖLYE</a></li>
          <li><a href="{{route('training')}}" class="text-sm tracking-wider py-8 px-4">EĞİTİMLER</a></li>
          <li><a href="{{route('campus')}}" class="text-sm tracking-wider py-8 px-4">KAMPÜS</a></li>
          <li><a href="{{route('news')}}" class="text-sm tracking-wider py-8 px-4">HABERLER</a></li>
          <li><a href="{{route('workshop')}}" class="text-sm tracking-wider py-8 px-4">BLOG</a></li>
          <li><a href="{{route('contact')}}" class="text-sm tracking-wider py-8 px-4">BİZE ULAŞIN</a></li>
        </ul>
      </div>
      <div class="social flex-none w-full md:w-[140px] align-right z-50">
        <div class="bg-[#BE1724] h-auto p-4 md:p-0 md:h-[273px] w-full md:w-[140px] absolute flex flex-row md:flex-col items-center justify-center my-0 md:-my-8">
          <div class="flex flex-row md:flex-col gap-8">
            <img src="{{asset('front/images/facebook.svg')}}" alt="facebook">
            <img src="{{asset('front/images/twitter.svg')}}" alt="twitter">
            <img src="{{asset('front/images/instagram.svg')}}" alt="instagram">
          </div>
        </div>
      </div>
    </header>
@if(!Route::is('index') && !Route::is('contact'))
@include('front.layouts.plugins.title')
@endif
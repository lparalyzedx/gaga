<!doctype html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','GAGA')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('front/dist/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('front/src/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/src/assets/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="{{asset('storage/web/'.$setting->favicon)}}">
  <meta name="description" content="{{$setting->company_description}}">
  <meta name="csrf-token" content="{{csrf_token()}}">

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
<body class=" bg-[#1B1B1B] mtc" style="width:100%;">
  <div class="content w-full h-full mx-auto flex-col items-center justify-center">

    <header class="w-full fixed  top-0 right-0 flex justify-between  items-center md:items-start md:justify-between py-8 pl-0 md:pl-24 bg-white" style="z-index: 149; height:8rem;">
      <div class="logo mb-4"><a href="{{route('index')}}"><img src="{{asset('storage/web/'.$setting->logo)}}" alt="GAGA" style="margin-left:1rem;"></a></div>
      <div class="menu flex items-center justify-center lg:mt-5">
        <ul class="header-menu hidden md:flex flex-col md:flex-row items-center justify-center transition-all duration-500" style="margin-top:1rem;">
          <li><a href="{{route('index')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">ANA SAYFA</a></li>
          <li><a href="{{route('company')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">HAKKIMIZDA</a></li>
          <li><a href="{{route('studio')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">ATÖLYE</a></li>
          <li><a href="{{route('training')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">EĞİTİMLER</a></li>
          <li><a href="{{route('campus')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">KAMPÜS</a></li>
          <li><a href="{{route('news')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">HABERLER</a></li>
          <li><a href="{{route('blog')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">BLOG</a></li>
          <li><a href="{{route('contact')}}" class="text-sm tracking-wider py-8 px-4 text-black hover:text-red-600 transition-colors">BİZE ULAŞIN</a></li>
        </ul>
      </div>
      <div class="social hidden md:flex  w-full md:w-[140px] align-right z-50">
        <div class="bg-[#BE1724] h-auto p-4 md:p-0 md:h-[273px] w-full md:w-[140px] absolute flex flex-row md:flex-col items-center justify-center my-0 md:-my-8">
          <div class="flex flex-row md:flex-col gap-8">
           <a href="{{$setting->facebook}}"><img src="{{asset('front/images/facebook.svg')}}" alt="facebook"></a>
            <a href="{{$setting->twitter}}"><img src="{{asset('front/images/twitter.svg')}}" alt="twitter"></a>
            <a href="{{$setting->instagram}}"><img src="{{asset('front/images/instagram.svg')}}" alt="instagram"></a>
          </div>
        </div>
      </div>
    </header>


    <div class="mobile-menu hidden fixed min-h-full min-w-full bg-white text-black z-50 inset-0 p-8" style="z-index:150;">

      <div class="relative min-h-full min-w-full h-24 flex flex-col">

        <div class="flex p-0  border-b">
          <span style="color: #BE1724 !important;" class="absolute top-24 right-0 cursor-pointer close-menu" style="margin-top:20rem;">
            <i class="fas fa-times text-3xl" style="margin-top: 1rem;"></i>
           </span>
   
           <div class="mb-4 logo">
             <img src="{{asset('storage/web/'.$setting->logo)}}" alt="GAGA" style="margin-left:-1rem;">
           </div>
        </div>
        <div class="mt-12">
          <ul class="flex flex-col items-center justify-center space-y-2">
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('index')}}" class=" tracking-wider" style="margin: 12px 0;">ANA SAYFA</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('company')}}" class=" tracking-wider" style="margin: 12px 0;">HAKKIMIZDA</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('training')}}" class="tracking-wider" style="margin: 12px 0;">EĞİTİMLER</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('campus')}}" class=" tracking-wider" style="margin: 12px 0;">KAMPÜS</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('studio')}}" class=" tracking-wider" style="margin: 12px 0;">ATÖLYE</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('news')}}" class=" tracking-wider" style="margin: 12px 0;">HABERLER</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('blog')}}" class=" tracking-wider" style="margin: 12px 0;">BLOG</a></li>
            <li class="py-2 transition-all px-4 hover:text-red-500 text-xsm"><a href="{{route('contact')}}" class=" tracking-wider" style="margin: 12px 0;">BİZE ULAŞIN</a></li>
          </ul>
        </div>
      </div>


    </div>

    <div class="block fixed top-0 right-0 md:hidden  p-2 border rounded-xl m-4 cursor-pointer" style=" border: none; color:#BE1724; z-index:150; margin-top:1rem;">
     
<?xml version="1.0" ?><svg height="44" viewBox="0 0 24 24" width="44" style="color:#BE1724 !important;" class="open-menu" xmlns="http://www.w3.org/2000/svg"><path d="M4 6H20M4 12H20M4 18H11" stroke="#BE1724" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>

    </div>

@if(!Route::is('index') && !Route::is('contact'))
@include('front.layouts.plugins.title')
@endif



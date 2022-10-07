<!doctype html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>@yield('title','GAGA')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('front/dist/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('front/src/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('front/src/assets/owl.theme.default.min.css')}}">
  <link rel="icon" type="image/x-icon" href="{{asset('storage/web/'.$setting->favicon)}}">
  <link rel="stylesheet" href="https://cdn.tailwindcss.com">
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
<body>
  <div class="w-full h-full mx-auto sticky top-10 z-50 ">

    <header class="header flex flex-col  item-center    md:flex-row justify-center items-center md:items-start md:justify-between py-8 pl-0 md:pl-24 bg-white">
      <div class="logo mb-4"><a href="{{route('index')}}"><img src="{{asset('storage/web/'.$setting->logo)}}" alt="GAGA"></a></div>
      <div class="menu flex justify-between text-sm ">
        <div class="block fixed top-0 right-0 md:hidden text-gray-400 p-2 border border-[#515151] rounded-xl m-4 cursor-pointer">

          <svg class="block h-6 w-6 open-menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
  
          <svg class="hidden h-6 w-6 close-menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
  
       </div>
  
        <ul class="header-menu items-center hidden md:flex flex-col z-50 color md:flex-row items-center justify-center transition-all  duration-500">
          <li><a href="{{route('index')}}" class="text-lg w-[10%] tracking-wider py-8 px-8 text-indigo-500">ANA SAYFA</a></li>
          <li><a href="{{route('company')}}" class="text-sm tracking-wider py-8 px-8">HAKKIMIZDA</a></li>
          <li><a href="{{route('studio')}}" class="text-sm tracking-wider py-8 px-8">ATÖLYE</a></li>
          <li><a href="{{route('training')}}" class="text-sm tracking-wider py-8 px-8">EĞİTİMLER</a></li>
          <li><a href="{{route('campus')}}" class="text-sm tracking-wider py-8 px-8">KAMPÜS</a></li>
          <li><a href="{{route('news')}}" class="text-sm tracking-wider py-8 px-8">HABERLER</a></li>
          <li><a href="{{route('blog')}}" class="text-sm tracking-wider py-8 px-8">BLOG</a></li>
          <li><a href="{{route('contact')}}" class="text-sm tracking-wider py-8 px-8">BİZE ULAŞIN</a></li>
        </ul>
      </div>
      <div id="social" class="social flex-none w-full md:w-[140px] align-right z-50">
        <div class="bg-[#BE1724] h-auto p-4 md:p-0 md:h-[273px] w-full md:w-[140px] absolute flex flex-row md:flex-col items-center justify-center my-0 md:-my-8">
          <div class=" flex-row md:flex-col gap-8 social hidden md:flex">
            <a href="{{$setting->facebook}}">
              <img src="{{asset('front/images/facebook.svg')}}" alt="facebook">
            </a>
            <a href="{{$setting->twitter}}">
              <img src="{{asset('front/images/twitter.svg')}}" alt="twitter">
            </a>
            <a href="{{$setting->instagram}}">
              <img src="{{asset('front/images/instagram.svg')}}" alt="instagram">
            </a>
          </div>
        </div>
      </div>
    </header>
@if(!Route::is('index') && !Route::is('contact'))
@include('front.layouts.plugins.title')
@endif

@section('js')
<script>
   $(".open-menu").on('click', function(e) {

e.preventDefault();
$(this).hide();
$('.close-menu').show();

$('.header-menu').removeClass('hidden');

});

$(".close-menu").on('click', function(e) {

e.preventDefault();
$(this).hide();
$('.open-menu').show();

$('.header-menu').addClass('hidden');

});

</script>

@endsection
@extends('front.layouts.master')
@section('title','İletişim')
@section('content')
@section('css')

@endsection
<div class="flex flex-col">

    <div id="harita" class="hidden md:flex">
      <h1 class="text-white font-semibold text-6xl absolute top-16 md:top-96 left-24">Bize Ulaşın</h1>
      <div class="absolute -bottom-96  w-1/2 md:w-[994px] h-auto md:h-[769px] px-8 md:px-48 py-16 md:py-48" style="background-image: url('{{asset('front/images/iletisim-bg.png')}}');">
        <h3 class="text-white text-lg md:text-3xl font-semibold">Gaziantep</h3>
        <p class="text-white mt-8" style="width: 350px">{{$setting->address}}
        </p>
        <div class="flex items-center gap-4 mt-16">
          <img src="{{asset('front/images/icons/map.svg')}}" alt="">
          <a href="{{$setting->map}}" class="text-white text-sm md:text-base">Haritada Görüntüle</a>
        </div>
      </div>

    </div>
    <img src="{{asset('front/images/maps.jpg')}}" class="info" style="object-fit: cover;">
      
    <div class="grid grid-cols-1 md:grid-cols-2 py-16 md:py-24  md:px-48 bg-[#1B1B1B]">
      <div class="flex-1 flex flex-col items-right justify-start md:hidden relative mt-8 md:mt-0 p-7 px-12 text-left" style="background:#BE1724; margin-top:-4rem; padding:5rem;">
        <h4 class="text-white text-3xl font-extrabold mb-4">Gaziantep</h4>
        <h2 class="text-white text-sm mb-8">{{$setting->address}}
            </h2>
            <span class="text-white">{{$setting->email}}</span>
            <br>
            <span class="text-white">{{$setting->phone}}</span>
            <div class="flex items-center gap-4 mt-16 text-center">
              <img src="{{asset('front/images/icons/map.svg')}}" alt="">
              <a href="{{$setting->map}}" class="text-white text-sm md:text-base">Haritada Görüntüle</a>
            </div>
        
</div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 py-16 md:py-24 px-4 md:px-48 bg-[#1B1B1B]">
      <div></div>
      <div>
        <div class="flex-1 relative mt-8 md:mt-0 p-7 text-center">
          <h4 class="text-white text-3xl font-extrabold mb-4">E-BÜLTENE <span class="font-normal text-3xl">KAYIT OL</span></h4>
          <h2 class="text-white text-xl font-medium mb-8">E-Bültene kayıt ol, projelerden indirimlerden ilk sen haberdar
              ol!</h2>
          <form action="{{route('return')}}" method="POST" class="flex items-center justify-center">
              @csrf
              <input class="bg-transparent border-b border-[#868686] py-4 w-4/6" type="email"
                  placeholder="E-Posta@adresiniz.com" name="email" required>
                  <img class="absolute right-0  icon"  src="{{ asset('front/images/icons/add.svg') }}" width="44"
                  height="44" alt="Gönder">
          </div>
          </form>
  </div>
      </div>

    </div>
  </div>
  @endsection   
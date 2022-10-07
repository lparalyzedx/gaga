@extends('front.layouts.master')
@section('title','İletişim')
@section('content')
<div class="flex flex-col">

    <div id="harita relative">
      <h1 class="text-white font-semibold text-6xl absolute top-16 md:top-96 left-24">Bize Ulaşın</h1>
      <div class="absolute -bottom-96  w-1/2 md:w-[994px] h-auto md:h-[769px] px-8 md:px-48 py-16 md:py-48" style="background-image: url('{{asset('front/images/iletisim-bg.png')}}')">
        <h3 class="text-white text-lg md:text-3xl font-semibold">Gaziantep</h3>
        <p class="text-white mt-8" style="width: 350px">{{$setting->address}}
        </p>
        <div class="flex items-center gap-4 mt-16">
          <img src="{{asset('front/images/icons/map.svg')}}" alt="">
          <a href="{{$setting->map}}" class="text-white text-sm md:text-base">Haritada Görüntüle</a>
        </div>
      </div>
      <img src="{{asset('front/images/maps.jpg')}}" class="" alt="">

    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 py-16 md:py-24 px-4 md:px-48 bg-[#1B1B1B]">
      <div></div>
      <div>
        <div class="flex-1 relative mt-8 md:mt-0">
          <h4 class="text-white text-3xl font-extrabold mb-4">E-BÜLTENE <span class="font-normal">KAYIT OL</span></h4>
          <p class="text-white text-xl font-medium mb-8">E-Bültene kayıt ol, projelerden indirimlerden ilk sen haberdar
              ol!</p>
          <form action="{{route('return')}}" method="POST">
              @csrf
              <input class="bg-transparent border-b border-[#868686] py-4 w-4/6" type="email"
                  placeholder="E-Posta@adresiniz.com" name="email" required>
          </form>
          <img class="absolute right-0 top-1/2" src="{{ asset('front/images/icons/add.svg') }}" width="44"
              height="44" alt="Gönder">
      </div>
      </div>

    </div>
  </div>
  @endsection   
@extends('front.layouts.master')
@section('title','Ekibimiz')
@section('content')
<div class="head-menu w-full px-8 md:px-48 block bg-[#242424]">
    <ul class="flex gap-2 md:gap-4">
      <li><a href="{{route('company')}}" class="block text-sm md:text-lg leading-3 text-white py-8 px-4">Hakkımızda</a></li>
      <li><a href="{{route('company')}}" class="block text-sm md:text-lg leading-3 text-white py-8 px-4">Neden GAGA’yı tercih etmeliyim?</a></li>
      <li><a href="{{route('team')}}" class="block text-sm md:text-lg leading-3 text-white py-8 px-4 bg-gradient-to-r from-[#791119] to-[#BE1724]">Ekibimiz</a></li>
    </ul>
  </div>

  <div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
    <div class="flex flex-col md:flex-row">
      <img src="{{asset('front/images/ekip/aslihan.jpg')}}" alt="Aslıhan Kaya" class="rounded-2xl basis-1/4" style="object-fit: cover;">
      <div class="flex flex-col gap-8 w-full basis-3/4 w-full px-8 md:px-24 py-8 md:py-24">
        <h3 class="text-2xl text-[#BE1724]">{{$people->name}}</h3>
        <span class="text-white font-medium">{{$people->rank}}</span>
        <p class="text-white">
          {{strip_tags($people->about)}}
        </p>
      </div>

    </div>

  </div>
  @endsection
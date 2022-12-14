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

  <div class="content grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-16 px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
    @foreach ($peoples as $people)
    <a href="{{route('team.detail',$people->slug)}}">
      <div class="flex flex-col gap-4 group">
        <img src="{{asset('storage/peoples/'.$people->image)}}" alt="{{$people->name}}" class="rounded-2xl grayscale hover:grayscale-0 hover:-mt-8 transition-all duration-500">
        <h3 class="text-2xl text-white group-hover:text-[#BE1724]">{{$people->name}}</h3>
        <span class="text-white font-medium">{{$people->rank}}</span>
      </div>
    </a>
    @endforeach
  </div>
  @endsection

  
@extends('front.layouts.master')
@section('title','Eğitimler')
@section('content')
<div class="content grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16 px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B] rounded">

    @foreach ($trainings as $training)
    <div class="flex flex-col gap-4 group  pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('storage/trainings/'.$training->image)}}'); background-repeat: no-repeat; border-top-left-radius: 1rem;
      border-top-right-radius: 1rem; border-bottom-right-radius: 1rem; border-bottom-right-radius: 1rem;">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-semibold text-3xl md:text-xl text-white">{{$training->name}}</h3>
        <a href="{{route('form')}}">
          <div class="training opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
            HEMEN BAŞVUR
            <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
          </div>
        </a>
      </div>
    </div>
    @endforeach

    
  </div>
  <div class="px-28 py-14 bg-[#242424]">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <img src="{{asset('front/images/egitim-suresi.svg')}}" alt="">
      <ul class="list-disc">
        <li class="text-white pt-4 " style="margin: 1rem;">Eğitimler 4 ay teorik ve pratik eğitim, 4 ay staj olarak planlanmaktadır.</li>
        <li class="text-white pt-4 " style="margin: 1rem;">Eğitimler 160 saat Temel ve Pratik Eğitim + 4 Ay Staj olarak planlanmaktadır.
        </li>
        <li class="text-white pt-4 " style="margin: 1rem;">Eğitimler 52 Saat Temel ve Pratik Eğitim + Staj olarak planlanmaktadır.</li>
    </ul>
    </div>
  </div>
  @endsection
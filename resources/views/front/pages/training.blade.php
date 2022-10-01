@extends('front.layouts.master')
@section('title','Eğitimler')
@section('content')
<div class="content grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16 px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">

    <div class="flex flex-col gap-4 group rounded-2xl pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('front/images/egitimler/profesyonel-ascilik-egitimi.jpg')}}')">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-base md:text-xl text-white">Profesyonel <br/> Aşçılık Eğitimi</h3>
        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
          HEMEN BAŞVUR
          <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-4 group rounded-2xl pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('front/images/egitimler/profesyonel-ascilik-egitimi.jpg')}}')">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-base md:text-xl text-white">Profesyonel <br/> Pastacılık ve Ekmekçilik Eğitimi</h3>
        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
          HEMEN BAŞVUR
          <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-4 group rounded-2xl pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('front/images/egitimler/profesyonel-ascilik-egitimi.jpg')}}')">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-base md:text-xl text-white">Servis Personelliği <br/> Eğitim Programı</h3>
        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
          HEMEN BAŞVUR
          <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-4 group rounded-2xl pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('front/images/egitimler/profesyonel-ascilik-egitimi.jpg')}}')">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-base md:text-xl text-white">Yiyecek İçecek İşletmeciliği <br/> Eğitim Programı</h3>
        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
          HEMEN BAŞVUR
          <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-4 group rounded-2xl pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('front/images/egitimler/profesyonel-ascilik-egitimi.jpg')}}')">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-base md:text-xl text-white">Temel Fırıncılık ve Pidecilik <br/> Eğitim Programı</h3>
        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
          HEMEN BAŞVUR
          <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-4 group rounded-2xl pt-72 md:pt-96 pb-16 pl-8 md:pl-16 cursor-pointer" style="background-image: url('{{asset('front/images/egitimler/profesyonel-ascilik-egitimi.jpg')}}')">
      <div class="flex flex-row gap-4 justify-between">
        <h3 class="text-base md:text-xl text-white">Barmenlik ve Miksoloji <br/> Eğitim Programı</h3>
        <div class="opacity-0 group-hover:opacity-100 transition-all duration-500 py-4 px-16 flex flex-row gap-4 items-center text-white rounded-tl-lg rounded-bl-lg bg-gradient-to-r from-[#791119] to-[#BE1724]">
          HEMEN BAŞVUR
          <img src="{{asset('front/images/icons/right-arrow.svg')}}" alt="" class="w-4 h-4">
        </div>
      </div>
    </div>

  </div>

  <div class="px-28 py-14 bg-[#242424]">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <img src="{{asset('front/images/egitim-suresi.svg')}}" alt="">
      <ul class="list-disc">
          <li class="text-white pt-4">Eğitimler 4 ay teorik ve pratik eğitim, 4 ay staj olarak planlanmaktadır.</li>
          <li class="text-white pt-4">Eğitimler 160 saat Temel ve Pratik Eğitim + 4 Ay Staj olarak planlanmaktadır.</li>
          <li class="text-white pt-4">Eğitimler 52 Saat Temel ve Pratik Eğitim + Staj olarak planlanmaktadır.</li>
      </ul>
    </div>
  </div>
  @endsection
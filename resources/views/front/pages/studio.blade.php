@extends('front.layouts.master')
@section('title','Atölye')
@section('content')
<div class="head-menu w-full px-8 md:px-48 block bg-[#242424]">
    <ul class="flex gap-2 md:gap-4">
      <li><a href="" class="block text-sm md:text-lg leading-3 text-white py-8 px-4 bg-gradient-to-r from-[#791119] to-[#BE1724]">Dönemsel Workshoplar</a></li>
      <li><a href="" class="block text-sm md:text-lg leading-3 text-white py-8 px-4">Günlük Workshoplar</a></li>
    </ul>
  </div>
<div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
    <div class="flex flex-col md:flex-row">

      <div class="flex flex-col gap-8 w-full basis-3/4 w-full px-8 md:px-24 py-8 md:py-24">
        <h1 class="text-2xl font-semibold text-white">İtalya Ayı</h1>
        <h3 class="text-base text-[#BE1724] tracking-[0.5em]">AĞUSTOS</h3>

        <p class="text-white">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
          <br /> <br />
          Why do we use it? <br /> <br />
          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
          <br /> <br />

          Where does it come from? <br /> <br />
          Contrary to popular belief, Lorem Ipsum is not simply random text.
        </p>
      </div>

      <div class="flex justify-center pl-16 md:pl-20 py-16 md:py-24 text-white w-full basis-1/4 bg-gradient-to-r from-[#791119] to-[#BE1724]">
        <ul>
         @foreach ($categories as $categorie)
         @if ($categorie->articles_count > 0)
         <li class="text-xl font-semibold mt-4 category" data-id="{{$categorie->id}}">{{$categorie->name}}</li>
         @endif
         @endforeach
        </ul>
      </div>

    </div>

  </div>

  <div class="grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3 px-16 md:px-48 py-16 md:py-24 bg-[#242424]">
    <img src="{{asset('front/images/atolye-example.jpg')}}" class="rounded-2xl" alt="">
    <img src="{{asset('front/images/atolye-example.jpg')}}" class="rounded-2xl" alt="">
    <img src="{{asset('front/images/atolye-example.jpg')}}" class="rounded-2xl" alt="">
  </div>
  @endsection

  
@extends('front.layouts.master')
@section('title','Kampüs')
@section('content')
<div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">

    <div class="grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3">
      @foreach ($images as $image)
      <img src="{{asset('storage/campus/'.$image->image)}}" class="rounded-2xl" alt="">
      @endforeach
    </div>

    <div class="text-center mt-24">
      <h1 class="text-white text-3xl">{{$campus->title}}</h1>
      <p class="text-white mt-8 md:mt-24">
             {!!strip_tags($campus->description)!!}      
        </p>
    </div>

  </div>
  @endsection
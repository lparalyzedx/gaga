@extends('front.layouts.master')
@section('title','Haberler')
@section('content')
<div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">

    <h1 class="text-white text-3xl">{{$news->title}}</h1>
    <p class="text-white mt-8 md:mt-24">
      {{strip_tags($news->description)}}
    </p>

  </div>

  <div class="grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3 px-16 md:px-48 py-16 md:py-24 bg-[#242424]">
    @foreach ($images as $image)
    <img src="{{asset('storage/news/'.$image->image)}}" class="rounded-2xl" alt="" style="width:400px !important; height: 300px !important; object-fit:cover;">
    @endforeach
  </div>
  @endsection
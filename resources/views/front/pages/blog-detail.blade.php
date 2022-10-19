@extends('front.layouts.master')
@section('title','Blog')
@section('content')

<div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">

    <h1 class="text-white text-3xl">{{$article->title}}</h1>
    <span class="text-white date text-sm blog-date">{{$article->created_at->format('d.m.Y')}}</span>
    <p class="text-white mt-8 md:mt-24">
      {!!$article->description!!}
    </p>

  </div>

  <div id="carousel" class="flex md:grid gap-4 md:gap-8 md:grid-cols-3 px-16 md:px-48 py-16 md:py-24 bg-[#242424] rounded-xl">
    @foreach ($article->images as $image)
    <img src="{{asset('storage/articles/'.$image->image)}}"  alt="" class="rounded-xl" style="width:400px !important; height: 300px !important; object-fit:cover;">
    @endforeach
  </div>
  @endsection


  @section('js')
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

  <script>
    $('#carousel').owlCarousel({
    loop: true,
    dots: true,
    nav: true,
    autoplay:true,
autoplayTimeout:2000,
autoplayHoverPause:true,
    responsiveClass:true,
    margin:10,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
})
  </script>

  @endsection
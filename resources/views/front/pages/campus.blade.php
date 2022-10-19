@extends('front.layouts.master')
@section('title','Kampüs')
@section('content')
<div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">

    <div id="carousel" class="flex items-center flex-shrink-0 md:grid grid-cols-6 gap-4 md:gap-8 md:grid-cols-3 rounded-xl" style="width: 100% !important;">
      @foreach ($images as $image)
      <img src="{{asset('storage/campus/'.$image->image)}}" class="" alt="" style="width:400px !important; height: 300px !important; object-fit:cover;">
      @endforeach
    </div>

    <div class="text-center mt-24">
      <h1 class="text-white text-3xl">{{$campus->title}}</h1>
      <p class="text-white mt-8 md:mt-24">
           {!!$campus->description!!}
        </p>
    </div>

  </div>
  @endsection

  @section('js')
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

  <script>
    $('#carousel').owlCarousel({
    loop: true,
    dots: false,
    nav: false,
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
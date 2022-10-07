@extends('front.layouts.master')
@section('title','Blog')
@section('content')
<div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
    <div class="flex flex-col md:flex-row">
      <div class="flex flex-col gap-8 w-full basis-3/4 w-full px-8 md:px-24 py-8 md:py-24">
        <h1 class="text-2xl font-semibold text-white">{{$article->title ?? 'Henüz makale eklenmedi..'}}</h1>

        <p class="text-white">
         {!!strip_tags($article->description ?? '')!!}
        </p>
      </div>

      @if(count($categories) > 0)

      <div class="flex justify-center px-16 md:px-20 py-16 md:py-24 text-right text-white w-full basis-1/4 bg-gradient-to-r from-[#791119] to-[#BE1724]">
        <ul>
         @foreach ($categories as $categorie)
         @if ($categorie->articles_count > 0)
         <li class="text-xl font-semibold mt-4 category"><a href="{{route('blog.detail',$categorie->slug)}}">{{$categorie->name}}</a></li>
         @endif
         @endforeach
        </ul>
      </div>
      @endif

    </div>

  </div>

  @if(!is_null($article))
  <div class="grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3 px-16 md:px-48 py-16 md:py-24 bg-[#242424]">
    @foreach ($article->images as $image)
    <img src="{{asset('storage/articles/'.$image->image)}}" class="rounded-2xl" alt="" style="width:400px !important; height: 300px !important; object-fit:cover;">
    @endforeach
 </div>
 @endif
  @endsection
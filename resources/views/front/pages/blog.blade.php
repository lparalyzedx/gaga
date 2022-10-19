@extends('front.layouts.master')
@section('title', 'Blog')
@section('content')

    <div id="list" class="flex flex-col items-center justify-center" style=>
        @foreach ($articles as $article)
            <div class="flex items-center  blog-list">
                <div class="blog-img">

                    <img src="{{ asset('storage/articles/' . $article->image) }}"  class="rounded blog-img">

                </div>
                <div class="flex flex-col justify-center   blog-div">
                    <h4 class="text-white text-3xl font-extrabold mt-2 blog-title">{{ $article->title }}</h4>
                    <span class="text-white blog-date" style="text-align: left !important;">{{$article->created_at->format('d.m.Y')}}</span>
                    <p class="text-white text-base font-semibold mt-2 description blog-desc">
                      {!! Str::limit($article->description,170) !!}
                    </p>
                    <a href="{{ route('blog.detail', $article->slug) }}" title="DEVAMINI OKU"
                        class="border border-white rounded-sm text-white py-4 mt-2 px-8 block blog-link">DEVAMINI OKU</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection

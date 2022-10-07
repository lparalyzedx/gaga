@extends('front.layouts.master')
@section('title', 'Günlük workshoplar')
@section('content')
    <div class="head-menu w-full px-8 md:px-48 block bg-[#242424]">
        <ul class="flex gap-2 md:gap-4">
            <li><a href="{{ route('studio') }}" class="block text-sm md:text-lg leading-3 text-white py-8 px-4 ">Dönemsel
                    Workshoplar</a></li>
            <li><a href="javascript:void(0)"
                    class="block text-sm md:text-lg leading-3 text-white py-8 px-4 bg-gradient-to-r from-[#791119] to-[#BE1724]">Günlük
                    Workshoplar</a></li>
        </ul>
    </div>
    <div class="content grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-16 px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
        @if ($articles)
            @foreach ($articles as $article)
                <a href="{{ route('workshop.detail', $article->slug) }}">
                    <div class="flex flex-col gap-4 group">
                        <img src="{{ asset('storage/articles/' . $article->image) }}"
                            class="rounded-2xl hover:-mt-8 transition-all duration-500"
                            style="width:400px !important; height: 300px !important; object-fit:cover;">
                        <h3 class="text-2xl text-white group-hover:text-[#BE1724]">{{ $article->title }}</h3>
                        <span class="text-white font-medium">{{ Str::limit(strip_tags($article->description), 70) }}
                        </span>
                    </div>
                </a>
            @endforeach
            @else
            <h1 class="text-2xl text-white group-hover:text-[#BE1724]">Henüz içerik eklenmedi..</h1>
        @endif
        
    </div>
@endsection

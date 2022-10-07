@extends('front.layouts.master')
@section('title', 'Atölye')
@section('content')
    <div class="head-menu w-full px-8 md:px-48 block bg-[#242424]">
        <ul class="flex gap-2 md:gap-4">
            <li><a href="javascript:void(0)"
                    class="block text-sm md:text-lg leading-3 text-white py-8 px-4 bg-gradient-to-r from-[#791119] to-[#BE1724]">Dönemsel
                    Workshoplar</a></li>
            <li><a href="{{ route('workshops') }}" class="block text-sm md:text-lg leading-3 text-white py-8 px-4">Günlük
                    Workshoplar</a></li>
        </ul>
    </div>
    <div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
        <div class="flex flex-col md:flex-row">

            <div class="flex flex-col gap-8 w-full basis-3/4 w-full px-8 md:px-24 py-8 md:py-24">
                <h1 class="text-2xl font-semibold text-white">{{ $article->title ?? '' }}</h1>
                <h3 class="text-base text-[#BE1724] tracking-[0.5em]">{{ $article->category->name ?? '' }} </h3>

                <p class="text-white">
                    {!! strip_tags($article->description ?? '') !!}
                </p>
            </div>



                <div
                    class="flex justify-center pl-16 md:pl-20 py-16 md:py-24 text-white w-full basis-1/4 bg-gradient-to-r from-[#791119] to-[#BE1724]">
                    <ul>
                        @foreach ($categories as $categorie)
                            @if ($categorie->articles_count > 0)
                                <li class="text-xl font-semibold mt-4 category"><a
                                        href="{{ route('studio.detail', $categorie->slug) }}">{{ $categorie->name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>

        </div>

    </div>

   @if(!is_null($article))
   <div class="grid grid-cols-1 gap-4 md:gap-8 md:grid-cols-3 px-16 md:px-48 py-16 md:py-24 bg-[#242424]">
    @foreach ($article->images as $image)
        <img src="{{ asset('storage/articles/' . $image->image) }}" class="rounded-2xl" alt=""
            style="width:400px !important; height: 300px !important; object-fit:cover;">
    @endforeach
</div>
@endif
@endsection

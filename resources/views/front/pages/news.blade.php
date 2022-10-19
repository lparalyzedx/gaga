@extends('front.layouts.master')
@section('title', 'Haberler')
@section('content')
    <div class="content grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-16 px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
        @foreach ($news as $new)
        <a href="{{route('news.detail',$new->slug)}}">
            <div class="flex flex-col gap-4 group">
                <img src="{{asset('storage/news/'.$new->image)}}"
                    class="rounded-2xl md:hover:-mt-8 transition-all duration-500" style="width:400px !important; height: 300px !important; object-fit:cover;">
                <h3 class="text-2xl text-white md:group-hover:text-[#BE1724]">{{$new->title}}</h3>
                <span class="text-white font-medium">{{Str::limit(strip_tags($new->description),70)}}
                </span>
            </div>
        </a>
        @endforeach
    </div>
@endsection

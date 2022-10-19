@extends('front.layouts.master')
@section('title', 'Atölye')
@section('content')
    <div class="content head-menu w-full px-8 md:px-48 block bg-[#242424]">
        <ul class="flex gap-2 md:gap-4">
            <li><a href="{{ route('studio') }}" class="block text-sm md:text-lg leading-3 text-white py-8 px-4">Dönemsel
                    Workshoplar</a></li>
            <li><a href="javascript:void(0)"
                    class="block text-sm md:text-lg leading-3 text-white py-8 px-4 bg-gradient-to-r from-[#791119] to-[#BE1724]">Günlük
                    Workshoplar</a></li>
        </ul>
    </div>


    <div
        class="blog-bar hidden  justify-center px-16 md:px-20 py-16 md:py-24 text-right text-white w-full basis-1/4 bg-gradient-to-r from-[#791119] to-[#BE1724]">
        <ul class="flex items-center justify-center" style="flex-wrap: wrap;">
            @foreach ($articles as $article)
            <li class="text-xl font-semibold mt-4 category"><a class="categorie" href="javascript:void(0)"
                style="font-size: 14px"  data-id="{{ $article->id }}">{{ $article->title }}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
        <div class="flex flex-col md:flex-row">

            <div class="flex flex-col gap-8  basis-3/4 w-full px-8 md:px-24 py-8 md:py-24">
                <h1 class="text-2xl font-semibold text-white title">{{ $article->title ?? '' }}</h1>
                <h3 class="text-base text-[#BE1724] tracking-[0.5em] date">{{ $article->category->name ?? '' }} </h3>

                <div class="description text-white">{!! $article->description !!}</div>
            </div>



            <div
                class="blog-bar-1 flex justify-center pl-16 md:pl-20 py-16 md:py-24 text-white w-full basis-1/4 bg-gradient-to-r from-[#791119] to-[#BE1724]">
                <ul>
                    @foreach ($articles as $article)
                        <li class="text-xl font-semibold mt-4 category"><a class="categorie" href="javascript:void(0)"
                                data-id="{{ $article->id }}">{{ $article->title }}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>

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
    });

    $(document).ready(function() {
            $('.description2').hide();
            $('.categorie').click(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                const self = $(this);

                $.ajax({

                    type: "POST",
                    url: "{{ route('fresh.article') }}",
                    data: {
                        id: this.getAttribute('data-id')
                    },
                    success: function(response) {
                        $('.title').text(response.article.title);
                        $('.date').text(response.article.category.name);
                        $('.description').html(response.article.description);
                        response.article.images.forEach(element => {
                            const image = document.createElement('img');
                            image.setAttribute('src',
                                '{{ asset('storage/articles/') }}/' + element.image);
                            image.setAttribute('class', 'article-img');
                            $('.images').innerHTML = '';
                            $('.images').innerHTML += image;

                        });

                    }
                });
            })

        });
      </script>
    
      @endsection

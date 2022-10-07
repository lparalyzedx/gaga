@extends('front.layouts.master')
@section('title', 'Anasayfa')
@section('content')
    <div class="owl-carousel p-0 m-0">
        @foreach ($slides as $slide)
            <div class="hero w-full h-[1080px] flex flex-col items-center justify-center"
                style="background-image: url('{{ asset('storage/slides/' . $slide->image) }}')">
                <div class="text text-center">
                    <h1 class="text-white text-3xl md:text-5xl">{{ $slide->title }}</h1>
                    <h2 class="text-white text-5xl md:text-8xl newyork-font">{{ $slide->text }}</h2>

                </div>
            </div>
        @endforeach
    </div>
    </div>

    <div class="flex flex-col md:flex-row items-start px-4 md:px-48 pt-24 pb-[523px] md:pb-[720px] gap-4 md:gap-48"
        style="background-image: url('{{ asset('front/images/bg-1.png') }}')">
        <div>
            <h3 class="text-white text-5xl font-extrabold">Hakkımızda</h3>
            <p class="text-white text-base font-semibold mt-12 mb-8">
                {!! strip_tags($setting->company_description) !!}
            </p>
            <a href="{{ route('company') }}" title="DEVAMINI OKU"
                class="border border-white rounded-sm text-white py-4 px-8 inline-block">DEVAMINI OKU</a>
        </div>
        <div class="z-50 bg-gradient-to-r from-[#BE1724] to-[#791119] p-16 mt-0 md:-mt-48 text-right rounded-2xl">
            <h3 title="HAKKIMIZDA" class="text-white text-2xl font-extrabold mb-20">HAKKIMIZDA</h3>
            <a href="{{ route('company') }}" title="HAKKIMIZDA"
                class="text-white font-semibold tracking-wider block">HAKKIMIZDA</a>
            <a href="{{ route('company') }}" title="NEDEN GAGA"
                class="text-white font-semibold tracking-wider py-8 block">NEDEN
                GAGA</a>
            <a href="{{ route('team') }}" title="EKİBİMİZ"
                class="text-white font-semibold tracking-wider block">EKİBİMİZ</a>
        </div>
    </div>

    <div class="flex flex-col md:flex-row px-4 md:px-48 pb-16 md:pb-80 gap-8 bg-[#242424]">
        <div class="mt-0 md:-mt-[560px] relative">
            <a href="{{ route('training') }}">
                <div class="absolute bottom-20 px-0 md:px-20">
                    <span class="text-white text-xl tracking-wider">PROFESYONEL</span>
                    <h5 class="text-white font-extrabold text-5xl mt-4">Eğitimler</h5>
                    <p class="text-white font-semibold mt-4">Mutfakta kariyer yapmak isteyenler için</p>
                </div>
                <img src="{{ asset('front/images/egitimler.png') }}" width="789" height="1023" alt="Eğitimler">
            </a>
        </div>

        <div class="flex flex-col gap-8 mt-0 md:-mt-[560px]">
            <div class="relative">
                <a href="{{ route('studio') }}">
                    <div class="absolute bottom-20 px-0 md:px-20">
                        <h5 class="text-white font-extrabold text-5xl mt-4">Atölye</h5>
                        <p class="text-white font-semibold mt-4">Mutfakta kariyer yapmak isteyenler için</p>
                    </div>
                    <img src="{{ asset('front/images/atolye.png') }}" width="789" height="495" alt="Eğitimler">
                </a>
            </div>
            <div class="relative">
                <a href="{{ route('campus') }}">
                    <div class="absolute bottom-20 px-0 md:px-20">
                        <h5 class="text-white font-extrabold text-5xl mt-4">Kampüs</h5>
                        <p class="text-white font-semibold mt-4">Mutfakta kariyer yapmak isteyenler için</p>
                    </div>
                    <img src="{{ asset('front/images/kampus.png') }}" width="789" height="495" alt="Eğitimler">
            </div>
            </a>

        </div>
    </div>
    <div
        class="flex flex-col md:flex-row items-start px-4 md:px-48 pt-8 md:pt-24 pb-16 md:pb-72 gap-8 md:gap-48 bg-[#1B1B1B] content">
        <div class="mt-0 md:-mt-64 flex-1">
            <span class="text-white text-xl tracking-wider">GAGA</span>
            <h3 class="text-white font-extrabold text-5xl mt-4">Haberler</h3>
            <h4 class="text-white text-3xl font-extrabold mt-32 mb-4 title">{{ $news[0]->title ?? 's' }}</h4>
            <span class="text-[#BE1724] date"></span>
            <p class="text-white text-base font-semibold mt-12 mb-8 description">{{ strip_tags($news[0]->title ?? 'S') }}
            </p>
            <a href="{{ route('news.detail', $news[0]->slug ?? 's') }}" title="DEVAMINI OKU"
                class="border border-white rounded-sm text-white py-4 px-8 inline-block link">DEVAMINI OKU</a>
        </div>

        <div class="mt-0 md:-mt-64 w-full md:max-w-[50%]">
            <ul>
                <li class="relative">
                    <div class="egitim-carousel">
                        @foreach ($news as $new)
                            <img src="{{ asset('storage/news/' . $new->image) }}"
                                style="width:789px !important; height:609px !important; object-fit:cover;"
                                data-id="{{ $new->id }}">
                        @endforeach
                    </div>
                </li>
            </ul>
            <div class="flex items-center justify-between">
                <a class="text-white tracking-wider" href="{{ route('news') }}" title="TÜMÜNÜ GÖRÜNTÜLE">TÜMÜNÜ
                    GÖRÜNTÜLE</a>
                <ol class="flex">
                    <li><a href="javascript:;" title="" class="bg-[#BE1724] p-8 inline-block"><img class="owl-geri"
                                src="{{ asset('front/images/icons/left-arrow.svg') }}" width="23" height="36"
                                alt=""></a></li>
                    <li><a href="javascript:;" title="" class="bg-[#BE1724] p-8 inline-block"><img class="owl-ileri"
                                src="{{ asset('front/images/icons/right-arrow.svg') }}" width="23" height="36"
                                alt=""></a></li>
                </ol>
            </div>
        </div>
    </div>

    <div class="flex flex-col md:flex-row items-start px-4 md:px-48 py-4 md:py-24 gap-4 md:gap-48 bg-[#242424]">
        <div class="relative mt-0 md:-mt-40 w-full md:max-w-[50%]">
            <div class="absolute right-0 top-8 rounded-tl-full rounded-bl-full text-white px-4 py-2 bg-[#BE1724]">
                <a class="flex gap-4" href="{{ $setting->youtube }}" title="Youtube kanalımızı ziyaret et">
                    <img src="{{ asset('front/images/icons/play.svg') }}" width="24" height="24" alt="">
                    Youtube kanalımızı ziyaret et</a>
            </div>
            <div class="absolute bottom-16 px-16">
                <p class="text-white font-semibold mt-4">Gaga’yı <br>yakından tanımak için</p>
                <h5 class="text-white font-extrabold text-3xl mt-4">TANITIM FİLMİNİ İZLEYİN</h5>
            </div>
            <img src="{{ asset('front/images/ebulten.png') }}" width="629" height="449" alt="">
        </div>
        <div class="flex-1 relative mt-8 md:mt-0">
            <h4 class="text-white text-3xl font-extrabold mb-4">E-BÜLTENE <span class="font-normal">KAYIT OL</span></h4>
            <p class="text-white text-xl font-medium mb-8">E-Bültene kayıt ol, projelerden indirimlerden ilk sen haberdar
                ol!</p>
            <form action="{{ route('return') }}" method="POST">
                @csrf
                <input class="bg-transparent border-b border-[#868686] py-4 w-4/6" type="email"
                    placeholder="E-Posta@adresiniz.com" name="email" required>
            </form>
            <img class="absolute right-0 top-1/2" src="{{ asset('front/images/icons/add.svg') }}" width="44"
                height="44" alt="Gönder">
        </div>
    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('front/src/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots: false,
            });



            $(".egitim-carousel").owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots: false,
                nav: true,
                onTranslated: counter
            });

            function counter(event) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                const self = $(this);
                const images = document.querySelectorAll('.egitim-carousel img');
                const image = images[event.item.index];
                $.ajax({

                    type: "POST",
                    url: "{{ route('fresh') }}",
                    data: {
                        id: image.getAttribute('data-id')
                    },
                    success: function(response) {
                        $('.title').text(response.title);
                        $('.description').html(response.description);
                        $('.link').attr('href', 'haberler/' + response.slug);
                        $('.date').text(response.date);
                        console.log(response.date);
                    }
                });
            }



            var owl = $('.egitim-carousel');
            owl.owlCarousel();

            // Go to the next item
            $('.owl-ileri').click(function() {
                owl.trigger('next.owl.carousel');
            })
            // Go to the previous item
            $('.owl-geri').click(function() {
                // With optional speed parameter
                // Parameters has to be in square bracket '[]'
                owl.trigger('prev.owl.carousel', [300]);
            })


            $(".open-menu").on('click', function(e) {

                e.preventDefault();
                $(this).hide();
                $('.close-menu').show();

                $('.header-menu').removeClass('hidden');

            });

            $(".close-menu").on('click', function(e) {

                e.preventDefault();
                $(this).hide();
                $('.open-menu').show();

                $('.header-menu').addClass('hidden');

            });

        });
    </script>
@endsection

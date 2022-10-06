@extends('front.layouts.master')
@section('title', 'Kurumsal')
@section('content')
    <div class="head-menu w-full px-8 md:px-48 block bg-[#242424]">
        <ul class="flex gap-2 md:gap-4">
            <li><a href=""
                    class="block text-sm md:text-lg leading-3 text-white py-8 px-4 bg-gradient-to-r from-[#791119] to-[#BE1724]"
                    id="about">Hakkımızda</a></li>
            <li><a href="" class="block text-sm md:text-lg leading-3 text-white py-8 px-4" id="whyus">Neden GAGA’yı
                    tercih etmeliyim?</a></li>
            <li><a href="" class="block text-sm md:text-lg leading-3 text-white py-8 px-4" id="team">Ekibimiz</a>
            </li>
        </ul>
    </div>

    <div class="content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">

        <div id="titles">
            <h2 class="text-2xl text-white font-semibold" id="title">GAGA Hakkında</h2>
            <p class="mt-8 text-white text-base leading-7" id="description">
                {{ strip_tags($setting->company_description) }}</p>
        </div>
        <div class="content grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-16 px-8  bg-[#1B1B1B]" id="peoples">
            @foreach ($peoples as $people)
                <a href="{{ route('team.detail', $people->slug) }}">
                    <div class="flex flex-col gap-4 group">
                        <img src="{{ asset('storage/peoples/' . $people->image) }}" alt="{{ $people->name }}"
                            class="rounded-2xl grayscale hover:grayscale-0 hover:-mt-8 transition-all duration-500">
                        <h3 class="text-2xl text-white group-hover:text-[#BE1724]">{{ $people->name }}</h3>
                        <span class="text-white font-medium">{{ $people->rank }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#peoples').hide();
        $('#whyus').click(function(e) {
            e.preventDefault();
            $('#about').removeClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#team').removeClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#whyus').addClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#title').text('Neden GAGA');
            $('#description').html('{{ strip_tags($setting->whyus) }}');
            $('#peoples').hide();
            $('#titles').show();

        });

        $('#about').click(function(e) {
            e.preventDefault();
            $('#whyus').removeClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#team').removeClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#about').addClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#titles').show();
            $('#title').text('GAGA Hakkında');
            $('#description').html('{{ strip_tags($setting->company_description) }}');
            $('#peoples').hide();

        });

        $('#team').click(function(e) {
            e.preventDefault();
            $('#about').removeClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#whyus').removeClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#team').addClass('bg-gradient-to-r from-[#791119] to-[#BE1724]');
            $('#titles').hide();
            $('#peoples').fadeIn()



        });
    </script>

@endsection

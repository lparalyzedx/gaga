@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')
<div class="block fixed top-0 right-0 md:hidden text-gray-400 p-2 border border-[#515151] rounded-xl m-4 cursor-pointer">

    <svg class="block h-6 w-6 open-menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
    </svg>

    <svg class="hidden h-6 w-6 close-menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>

  </div>


  <div class="owl-carousel p-0 m-0">

    <div class="hero w-full h-[1080px] flex flex-col items-center justify-center" style="background-image: url('{{asset('front/images/banner.png')}}')">
      <div class="text text-center">
        <h1 class="text-white text-3xl md:text-5xl">GAGA</h1>
        <h2 class="text-white text-5xl md:text-8xl newyork-font">Öğrencilerini <br> Bekliyor</h2>
        
      </div>
    </div>

    <div class="hero w-full h-[1080px] flex flex-col items-center justify-center" style="background-image: url('{{asset('front/images/banner.png')}}')">
      <div class="text text-center">
        <h1 class="text-white text-3xl md:text-5xl">GAGA</h1>
        <h2 class="text-white text-5xl md:text-8xl newyork-font">Öğrencilerini</h2>
        <h2 class="text-white text-5xl md:text-8xl newyork-font">Bekliyor 2</h2>
      </div>
    </div>

    <div class="hero w-full h-[1080px] flex flex-col items-center justify-center" style="background-image: url('{{asset('front/images/banner.png')}}')">
      <div class="text text-center">
        <h1 class="text-white text-3xl md:text-5xl">GAGA</h1>
        <h2 class="text-white text-5xl md:text-8xl newyork-font">Öğrencilerini</h2>
        <h2 class="text-white text-5xl md:text-8xl newyork-font">Bekliyor 3</h2>
      </div>
    </div>
  </div>
</div>

<div class="flex flex-col md:flex-row items-start px-4 md:px-48 pt-24 pb-[523px] md:pb-[720px] gap-4 md:gap-48" style="background-image: url('{{asset('front/images/bg-1.png')}}')">
  <div>
      <h3 class="text-white text-5xl font-extrabold">Hakkımızda</h3>
      <p class="text-white text-base font-semibold mt-12 mb-8">Dünyanın ilk yerleşim yerlerinden biri olan Dülük Antik Kentine, ticaretin merkezi
        Zeugma Antik Kentine, sanatın merkezi Yesemek Açık Hava Müzesine ev sahipliği yapan
        bu topraklarda sofralar, güneşin sıcağı ile olgunlaşan ve ateşin korunda pişen lezzetler ile
        kurulur. Bütün yemekler güneşin ve ateşin tadını adeta bir mühür gibi üzerinde taşır.</p>
    <a href="#" title="DEVAMINI OKU" class="border border-white rounded-sm text-white py-4 px-8 inline-block">DEVAMINI OKU</a>
  </div>
  <div class="z-50 bg-gradient-to-r from-[#BE1724] to-[#791119] p-16 mt-0 md:-mt-48 text-right rounded-2xl">
    <h3 title="HAKKIMIZDA" class="text-white text-2xl font-extrabold mb-20">HAKKIMIZDA</h3>
    <a href="/hakkimizda.html" title="HAKKIMIZDA" class="text-white font-semibold tracking-wider block">HAKKIMIZDA</a>
    <a href="/neden-gaga.html" title="NEDEN GAGA" class="text-white font-semibold tracking-wider py-8 block">NEDEN GAGA</a>
    <a href="/ekibimiz.html" title="EKİBİMİZ" class="text-white font-semibold tracking-wider block">EKİBİMİZ</a>
  </div>
</div>

<div class="flex flex-col md:flex-row px-4 md:px-48 pb-16 md:pb-80 gap-8 bg-[#242424]">
  <div class="mt-0 md:-mt-[560px] relative">
    <div class="absolute bottom-20 px-0 md:px-20">
      <span class="text-white text-xl tracking-wider">PROFESYONEL</span>
      <h5 class="text-white font-extrabold text-5xl mt-4">Eğitimler</h5>
      <p class="text-white font-semibold mt-4">Mutfakta kariyer yapmak isteyenler için</p>
    </div>
    <img src="{{asset('front/images/egitimler.png')}}" width="789" height="1023" alt="Eğitimler">
  </div>

  <div class="flex flex-col gap-8 mt-0 md:-mt-[560px]">
    <div class="relative">
      <div class="absolute bottom-20 px-0 md:px-20">
        <h5 class="text-white font-extrabold text-5xl mt-4">Atölye</h5>
        <p class="text-white font-semibold mt-4">Mutfakta kariyer yapmak isteyenler için</p>
      </div>
      <img src="{{asset('front/images/atolye.png')}}" width="789" height="495" alt="Eğitimler">
    </div>
    <div class="relative">
      <div class="absolute bottom-20 px-0 md:px-20">
        <h5 class="text-white font-extrabold text-5xl mt-4">Kampüs</h5>
        <p class="text-white font-semibold mt-4">Mutfakta kariyer yapmak isteyenler için</p>
      </div>
      <img src="{{asset('front/images/kampus.png')}}" width="789" height="495" alt="Eğitimler">
    </div>
  </div>
</div>

<div class="flex flex-col md:flex-row items-start px-4 md:px-48 pt-8 md:pt-24 pb-16 md:pb-72 gap-8 md:gap-48 bg-[#1B1B1B]">
  <div class="mt-0 md:-mt-64 flex-1">
    <span class="text-white text-xl tracking-wider">GAGA</span>
    <h3 class="text-white font-extrabold text-5xl mt-4">Haberler</h3>
    <h4 class="text-white text-3xl font-extrabold mt-32 mb-4">Atölye Eğitimimiz</h4>
    <span class="text-[#BE1724]">27.06.2022</span>
    <p class="text-white text-base font-semibold mt-12 mb-8">Dünyanın ilk yerleşim yerlerinden biri olan Dülük Antik Kentine, ticaretin merkezi
      Zeugma Antik Kentine, sanatın merkezi Yesemek Açık Hava Müzesine ev sahipliği yapan
      bu topraklarda sofralar, güneşin sıcağı ile olgunlaşan ve ateşin korunda pişen lezzetler ile
      kurulur. Bütün yemekler güneşin ve ateşin tadını adeta bir mühür gibi üzerinde taşır.</p>
    <a href="#" title="DEVAMINI OKU" class="border border-white rounded-sm text-white py-4 px-8 inline-block">DEVAMINI OKU</a>
  </div>

  <div class="mt-0 md:-mt-64 w-full md:max-w-[50%]">
    <ul>
      <li class="relative">
        <div class="egitim-carousel">
        <img src="{{asset('front/images/haber.png')}}" width="789"  height="609" alt="">
        <img src="{{asset('front/images/haber.png')}}" width="789"  height="609" alt="">
        </div>
      </li>
    </ul>
    <div class="flex items-center justify-between">
      <a class="text-white tracking-wider" href="" title="TÜMÜNÜ GÖRÜNTÜLE">TÜMÜNÜ GÖRÜNTÜLE</a>
      <ol class="flex">
        <li><a href="javascript:;" title="" class="bg-[#BE1724] p-8 inline-block"><img class="owl-geri" src="{{asset('front/images/icons/left-arrow.svg')}}" width="23" height="36" alt=""></a></li>
        <li><a href="javascript:;" title="" class="bg-[#BE1724] p-8 inline-block"><img class="owl-ileri" src="{{asset('front/images/icons/right-arrow.svg')}}" width="23" height="36" alt=""></a></li>
      </ol>
    </div>
  </div>
</div>

<div class="flex flex-col md:flex-row items-start px-4 md:px-48 py-4 md:py-24 gap-4 md:gap-48 bg-[#242424]">
  <div class="relative mt-0 md:-mt-40 w-full md:max-w-[50%]">
    <div class="absolute right-0 top-8 rounded-tl-full rounded-bl-full text-white px-4 py-2 bg-[#BE1724]">
      <a class="flex gap-4" href="" title="Youtube kanalımızı ziyaret et">
        <img src="{{asset('front/images/icons/play.svg')}}" width="24" height="24" alt="">
        Youtube kanalımızı ziyaret et</a>
    </div>
    <div class="absolute bottom-16 px-16">
      <p class="text-white font-semibold mt-4">Gaga’yı <br>yakından tanımak için</p>
      <h5 class="text-white font-extrabold text-3xl mt-4">TANITIM FİLMİNİ İZLEYİN</h5>
    </div>
    <img src="{{asset('front/images/ebulten.png')}}" width="629" height="449" alt="">
  </div>
  <div class="flex-1 relative mt-8 md:mt-0">
    <h4 class="text-white text-3xl font-extrabold mb-4">E-BÜLTENE <span class="font-normal">KAYIT OL</span></h4>
    <p class="text-white text-xl font-medium mb-8">E-Bültene kayıt ol, projelerden indirimlerden ilk sen haberdar ol!</p>
    <form action="" method="post">
      <input class="bg-transparent border-b border-[#868686] py-4 w-4/6" type="text" placeholder="E-Posta@adresiniz.com" name="" id="">
    </form>
    <img class="absolute right-0 top-1/2" src="{{asset('front/images/icons/add.svg')}}" width="44" height="44" alt="Gönder">
  </div>
</div>
@endsection
@section('js')
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="{{asset('front/src/owl.carousel.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $(".owl-carousel").owlCarousel({
        loop:true,
        items:1,
        autoplay:true,
        dots:false,
      });



      $(".egitim-carousel").owlCarousel({
        loop:true,
        items:1,
        autoplay:true,
        dots:false,
        nav:true,
      });

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


      $(".open-menu").on('click',function (e){

        e.preventDefault();
        $(this).hide();
        $('.close-menu').show();

        $('.header-menu').removeClass('hidden');

      });

      $(".close-menu").on('click',function (e){

        e.preventDefault();
        $(this).hide();
        $('.open-menu').show();

        $('.header-menu').addClass('hidden');

      });

    });
    </script>
@endsection
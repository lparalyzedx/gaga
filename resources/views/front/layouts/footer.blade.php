<footer class="bg-black flex flex-col md:flex-row flex-wrap gap-10 px-4 md:px-48 pt-32 pb-16">
    <div class="grid grid-cols-1 md:grid-cols-3 w-full">

        <div>
            <a class="text-[#BE1724] text-sm tracking-widest" href="{{ route('index') }}" title="{{strtoupper(Request::segment(1))}}">{{strtoupper(Request::segment(1))}}</a>
            <div class="mt-8">
                <h6 class="text-white text-sm tracking-widest mb-8">HAKKIMIZDA</h6>
                <ul class="flex flex-col gap-4">
                    <li><a class="text-sm font-semibold text-[#6C6C6C]" href="{{route('company')}}" title="Hakkımızda">Hakkımızda</a>
                    </li>
                    <li><a class="text-sm font-semibold text-[#6C6C6C]" href="{{route('company')}}" title="Neden Gaga">Neden Gaga</a>
                    </li>
                </ul>
            </div>
            <div class="mt-16">
                <h6 class="text-white text-sm tracking-widest mb-8">EĞİTİMLER</h6>
                <ul class="flex flex-col gap-4">
                    @foreach ($trainings as $training)
                        <li><a class="text-sm font-semibold text-[#6C6C6C]" href="{{ route('training') }}"
                                title="{{ $training->name }}">{{ $training->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="grow">
            <div>
                <h6 class="text-white text-sm tracking-widest mb-8">ATÖLYE</h6>
                <ul class="flex flex-col gap-4">
                    <li><a class="text-sm font-semibold text-[#6C6C6C]" href="{{route('studio')}}"
                            title="Dönemsel Workshoplar">Dönemsel Workshoplar</a></li>
                    <li><a class="text-sm font-semibold text-[#6C6C6C]" href="{{route('workshops')}}" title="Günlük Workshoplar">Günlük
                            Workshoplar</a></li>
                </ul>
                <ul class="flex flex-col gap-8 mt-16">
                    <li><a class="text-white text-sm tracking-widest" href="{{ route('campus') }}"
                            title="KAMPÜS">KAMPÜS</a></li>
                    <li><a class="text-white text-sm tracking-widest" href="{{ route('news') }}"
                            title="HABERLER">HABERLER</a></li>
                    <li><a class="text-white text-sm tracking-widest" href="{{ route('news') }}" title="BLOG">BLOG</a>
                    </li>
                </ul>
            </div>
            <ul class="flex gap-4 mt-8">
                <li><a href="{{ $setting->facebook }}" title="Facebook"><img
                            src="{{ asset('front/images/icons/facebook.svg') }}" alt="Facebook" width="28"
                            height="24"></a></li>
                <li><a href="{{ $setting->twitter }}" title="Twitter"><img
                            src="{{ asset('front/images/icons/twitter.svg') }}" alt="Twitter" width="28"
                            height="24"></a></li>
                <li><a href="{{ $setting->instagram }}" title="Instagram"><img
                            src="{{ asset('front/images/icons/instagram.svg') }}" alt="Instagram" width="28"
                            height="24"></a></li>
            </ul>
        </div>

        <div class="flex-1 mt-8 md:mt-0">
            <h5 class="text-white font-extrabold text-xl mb-6">BİZE YAZIN</h5>
            <p class="text-[#6C6C6C] font-medium">Formu doldurun müşteri temsilcimiz sizi en kısa sürede arayıp detaylı
                bilgilendirmeyi yapsın.
            </p>
            <form action="{{ route('email') }}" method="post" class="flex flex-col flex-shrink mt-16 gap-6">
                @csrf
                <input class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    type="text" name="name" placeholder="Adınız Soyadınız">
                <input class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    type="email" name="email" placeholder="E-Postanız">
                <div class="flex flex-col md:flex-row gap-4">
                    <textarea class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm" name="message"
                        id="message" cols="30" rows="5" placeholder="Mesajınız"></textarea>
                    <button type="submit"
                        class="flex items-center justify-center bg-[#BE1724] p-12 flex-1 rounded-tl-xl rounded-br-xl"><img
                            src="{{ asset('front/images/icons/send.svg') }}" width="31" height="31"
                            alt=""></button>
                </div>
            </form>
        </div>

    </div>

    <div class="flex flex-col md:flex-row gap-8 items-center">
        <img src="{{ asset('front/images/gto.png') }}" width="71" height="72" alt="">
        <p class="text-white text-sm">Gaga bir Gaziantep Ticaret Odası uygulamasıdır.</p>
    </div>

    <div class="w-full flex items-center justify-between">
        <div>
            <p class="text-[#6C6C6C] text-sm font-semibold">©2021 GAGA Gaziantep Gastronomi Akademisi. All rights
                reserved.</p>
        </div>
        <div>
            <ul class="flex flex-col md:flex-row gap-8">
                <li><a href="#" class="text-[#6C6C6C] text-sm font-semibold" title="Kullanım Koşulları">Kullanım
                        Koşulları</a></li>
                <li><a href="#" class="text-[#6C6C6C] text-sm font-semibold" title="Üyelik Sözleşmesi">Üyelik
                        Sözleşmesi</a></li>
                <li><a href="#" class="text-[#6C6C6C] text-sm font-semibold"
                        title="Kişisel Verilen Korunması ve İşlenmesi">Kişisel Verilen Korunması ve İşlenmesi</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@yield('js')
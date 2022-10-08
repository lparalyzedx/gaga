@extends('front.layouts.master')
@section('title', 'Başvuru formu')
@section('css')
    <style>
        .body::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        .body::-webkit-scrollbar-thumb {
            background: rgba(90, 90, 90);
        }

        .body::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.2);
        }

        .checkbox {
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            color: #F1FFF1
        }

        .checkbox__input {
            display: none;
        }

        .checkbox__box {
            width: 1.2em;
            height: 1.2em;
            border: 2px solid #707070;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .checkbox__box::after {
            content: '\220E';
            margin-bottom: 3px;
            color: transparent;
        }

        .checkbox__input:checked+.checkbox__box::after {
            color: #BE1724;
        }
    </style>
@endsection
@section('content')
    <div class="grid place-items-center h-screen content px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]"
        style="display:flex; flex-direction:column; align-items:center;">
        <div style="margin-top: 3rem; margin-bottom:3rem;">
            <h1 class="text-white text-3xl mb-2" style="text-align: center">Eğitim Başvuru Formu</h1>
            <p style="font-weight:500; color: #515151; margin-top:1.2rem;">Formu doldurarak başvuru yapın. Eğitimlerimizden
                faydalanın.</p>
        </div>
        <div class="display:flex; flex-wrap:wrap; align-items:center; justify-content:center;">
        </div>
        <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:center;">
            <form action="{{ route('application') }}" method="POST"
                style="display:flex; flex-wrap:wrap; align-items:center; justify-content:center;">
                @csrf
                <input type="text" class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="Adınız" name="name" style="width:23rem; margin:1rem;" required>
                <input type="text" name="surname"
                    class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="Soyadınız" style="width:23rem; margin:1rem;" required>
                <select type="text" name="gender"
                    class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    style="width:23rem; margin:1rem;" required>
                    <option selected style="padding: 2rem;">Cinsiyetiniz</option>
                    <option value="Erkek" style="padding: 2rem;">Erkek</option>
                    <option value="Kadın" style="padding: 2rem;">Kadın</option>
                    <option value="Özel" style="padding: 2rem;">Özel</option>
                </select>
                <input type="text" name="birthday"
                    class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="Doğum tarihiniz" style="width:23rem; margin:1rem;" required>
                <input type="text" name="phone"
                    class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="Telefon numarası" style="width:23rem; margin:1rem;" required>
                <input type="email" name="email"
                    class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="E-posta adresi" style="width:23rem; margin:1rem;" required>
                <input type="text" name="training"
                    class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="Katılmak İstediğiniz Program" style="width:23rem; margin:1rem;" required>
                <select name="city" class="bg-transparent border p-6 border-[#515151] rounded-xl text-[#515151] text-sm"
                    placeholder="Şehir" style="width:23rem; margin:1rem;" required>
                    <option value="">Şehir</option>
                    <option value="Adana">Adana</option>
                    <option value="Adıyaman">Adıyaman</option>
                    <option value="Afyonkarahisar">Afyonkarahisar</option>
                    <option value="Ağrı">Ağrı</option>
                    <option value="Amasya">Amasya</option>
                    <option value="Ankara">Ankara</option>
                    <option value="Antalya">Antalya</option>
                    <option value="Artvin">Artvin</option>
                    <option value="Aydın">Aydın</option>
                    <option value="Balıkesir">Balıkesir</option>
                    <option value="Bilecik">Bilecik</option>
                    <option value="Bimgöl">Bingöl</option>
                    <option value="Bitlis">Bitlis</option>
                    <option value="Bolu">Bolu</option>
                    <option value="Burdur">Burdur</option>
                    <option value="Bursa">Bursa</option>
                    <option value="Çanakkale">Çanakkale</option>
                    <option value="Çankırı">Çankırı</option>
                    <option value="Çorum">Çorum</option>
                    <option value="Denizli">Denizli</option>
                    <option value="Diyarbakır">Diyarbakır</option>
                    <option value="Edirne">Edirne</option>
                    <option value="Elazığ">Elazığ</option>
                    <option value="Erzincan">Erzincan</option>
                    <option value="Erzurum">Erzurum</option>
                    <option value="Eskişehir">Eskişehir</option>
                    <option value="Gaziantep">Gaziantep</option>
                    <option value="Giresun">Giresun</option>
                    <option value="Gümüşhane">Gümüşhane</option>
                    <option value="Hakkâri">Hakkâri</option>
                    <option value="Hatay">Hatay</option>
                    <option value="Isparta">Isparta</option>
                    <option value="Mersin">Mersin</option>
                    <option value="İstanbul">İstanbul</option>
                    <option value="İzmir">İzmir</option>
                    <option value="Kars">Kars</option>
                    <option value="Kastamonu">Kastamonu</option>
                    <option value="Kayseri">Kayseri</option>
                    <option value="Kırklareli">Kırklareli</option>
                    <option value="Kırşehir">Kırşehir</option>
                    <option value="Kocaeli">Kocaeli</option>
                    <option value="Konya">Konya</option>
                    <option value="Kütahya">Kütahya</option>
                    <option value="Malatya">Malatya</option>
                    <option value="Manisa">Manisa</option>
                    <option value="Kahramanmaraş">Kahramanmaraş</option>
                    <option value="Mardin">Mardin</option>
                    <option value="Muğla">Muğla</option>
                    <option value="Muş">Muş</option>
                    <option value="Nevşehir">Nevşehir</option>
                    <option value="Niğde">Niğde</option>
                    <option value="Ordu">Ordu</option>
                    <option value="Rize">Rize</option>
                    <option value="Sakarya">Sakarya</option>
                    <option value="Sakarya">Sakarya</option>
                    <option value="Siirt">Siirt</option>
                    <option value="Sinop">Sinop</option>
                    <option value="Sivas">Sivas</option>
                    <option value="Tekirdağ">Tekirdağ</option>
                    <option value="Tokat">Tokat</option>
                    <option value="Trabzon">Trabzon</option>
                    <option value="Tunceli">Tunceli</option>
                    <option value="Şanlıurfa">Şanlıurfa</option>
                    <option value="Uşak">Uşak</option>
                    <option value="Van">Van</option>
                    <option value="Yozgat">Yozgat</option>
                    <option value="Zonguldak">Zonguldak</option>
                    <option value="Aksaray">Aksaray</option>
                    <option value="Bayburt">Bayburt</option>
                    <option value="Karaman">Karaman</option>
                    <option value="Kırıkkale">Kırıkkale</option>
                    <option value="Batman">Batman</option>
                    <option value="Şırnak">Şırnak</option>
                    <option value="Bartın">Bartın</option>
                    <option value="Ardahan">Ardahan</option>
                    <option value="Iğdır">Iğdır</option>
                    <option value="Yalova">Yalova</option>
                    <option value="Karabük">Karabük</option>
                    <option value="Kilis">Kilis</option>
                    <option value="Osmaniye">Osmaniye</option>
                    <option value="Düzce">Düzce</option>
                </select>
                <div style="width:23rem; margin:1rem;">
                    <div class="" style="flex: 2; width:25rem; margin-bottom:1rem;">
                        <label class="checkbox" for="mycheckbox">
                            <input type="checkbox" name="suggestion" id="mycheckbox" class="checkbox__input" required>
                            <div class="checkbox__box"></div>
                            E-posta yoluyla haberdar olun.
                        </label>
                    </div>
                    <div class="">
                        <label class="checkbox" for="mycheckbox2" id="kosul">
                            <input type="checkbox" name="terms" id="mycheckbox2" class="checkbox__input" required>
                            <div class="checkbox__box"></div>
                            Kullanım şartlarını okudum ve onaylıyorum.
                        </label>
                    </div>
                </div>
                <div class="w-100"
                    style="width: 100%; height:100%; position: fixed; top:55%; left:50%; z-index:500; backdrop-filter:blur(5px); transform: translate(-50%,-50%); display:none"
                    id="desc">
                    <div
                        style="width:70%;  margin: 10rem auto; border-radius:6px; background:#515151; color:#fff; padding:2rem;">
                        <div class="header" style="padding:.5rem; margin-bottom:.5rem;">
                            <h1 style="text-align: center; font-size:18px;">Kullanım Şartları</h1>
                        </div>
                        <div class="body"
                            style="padding:1rem; border: 1px solid #ffff;  overflow-y:scroll; height:20rem; overflow:overlay; ">
                            <p>
                                {{ $setting->terms }}
                            </p>
                        </div>
                        <br>
                        <div style="text-align: center">
                            <button
                                style="padding: .6rem 1.2rem; border:1px solid #ffff; margin: 1rem auto: text-align:center; margin-right:auto;"
                                id="close">Başvuru
                                Ekranında Dön</button>

                        </div>
                    </div>
                </div>
                <div
                    style="width: 100%; height:100%; position: fixed; top:70%; left:50%; z-index:500; backdrop-filter:blur(5px); transform: translate(-50%,-50%); {{ Session::has('send') ? '' : 'display:none'}} ">
                    <div class="w-success" id="success"
                        style="width: 80% !important; margin:2rem auto; padding:2rem; background:#BE1724; color:#fff; border-radius:6px; text-align:center;">
                        <h1 style="font-size: 20px; text-align:center; margin-bottom:2rem;">Başvuru Yapıldı</h1>
                        <p style="text-align: center; margin-bottom:2rem;"> Eğitim Başvurunuz tamamlanmıştır, size en kısa
                            sürede dönüş yapılacaktır.
                        </p>
                        <a href="{{route('index')}}"
                            style="padding: .6rem 1.2rem; border:1px solid #ffff; margin: 1rem auto: text-align:center; margin-right:auto;"
                            id="close">Anasayfaya Dön</a>
                    </div>
                </div>


                <div style="width:23rem; margin:1rem;">
                    <button type="submit" style="width:35.333%; padding:1rem; margin-left:auto; color:#fff;"
                        class="flex items-center justify-center bg-[#BE1724] p-12  rounded-tl-xl rounded-br-xl">
                        <img src="{{ asset('front/images/icons/send.svg') }}" width="21" height="21"
                            alt="">&nbsp;Gönder
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="px-28 py-14 bg-[#242424]">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <img src="{{ asset('front/images/egitim-suresi.svg') }}" alt="">
            <ul class="list-disc">
                <li class="text-white pt-4">Eğitimler 4 ay teorik ve pratik eğitim, 4 ay staj olarak planlanmaktadır.</li>
                <li class="text-white pt-4">Eğitimler 160 saat Temel ve Pratik Eğitim + 4 Ay Staj olarak planlanmaktadır.
                </li>
                <li class="text-white pt-4">Eğitimler 52 Saat Temel ve Pratik Eğitim + Staj olarak planlanmaktadır.</li>
            </ul>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $('#kosul').click(function(param) {
            $('#desc').fadeIn();
            $('#close').click(function(param) {
                $('#desc').fadeOut()
            })
        });
    </script>
@endsection

@extends('front.layouts.master')
@section('title', 'Haberler')
@section('content')
    <div class="content grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-16 px-8 md:px-48  py-8 md:py-24 bg-[#1B1B1B]">
        <div class="flex flex-col gap-4 group">
            <img src="{{ asset('front/images/haber-example.jpg') }}" alt="Aslıhan Kaya"
                class="rounded-2xl hover:-mt-8 transition-all duration-500">
            <h3 class="text-2xl text-white group-hover:text-[#BE1724]">Profesyonel Aşçılık Eğitimi</h3>
            <span class="text-white font-medium">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </span>
        </div>

        <div class="flex flex-col gap-4 group">
            <img src="{{ asset('front/images/haber-example.jpg') }}" alt="Aslıhan Kaya"
                class="rounded-2xl hover:-mt-8 transition-all duration-500">
            <h3 class="text-2xl text-white group-hover:text-[#BE1724]">Profesyonel Aşçılık Eğitimi</h3>
            <span class="text-white font-medium">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </span>
        </div>
        <div class="flex flex-col gap-4 group">
            <img src="{{ asset('front/images/haber-example.jpg') }}" alt="Aslıhan Kaya"
                class="rounded-2xl hover:-mt-8 transition-all duration-500">
            <h3 class="text-2xl text-white group-hover:text-[#BE1724]">Profesyonel Aşçılık Eğitimi</h3>
            <span class="text-white font-medium">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </span>
        </div>
        <div class="flex flex-col gap-4 group">
            <img src="{{ asset('front/images/haber-example.jpg') }}" alt="Aslıhan Kaya"
                class="rounded-2xl hover:-mt-8 transition-all duration-500">
            <h3 class="text-2xl text-white group-hover:text-[#BE1724]">Profesyonel Aşçılık Eğitimi</h3>
            <span class="text-white font-medium">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </span>
        </div>
        <div class="flex flex-col gap-4 group">
            <img src="{{ asset('front/images/haber-example.jpg') }}" alt="Aslıhan Kaya"
                class="rounded-2xl hover:-mt-8 transition-all duration-500">
            <h3 class="text-2xl text-white group-hover:text-[#BE1724]">Profesyonel Aşçılık Eğitimi</h3>
            <span class="text-white font-medium">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            </span>
        </div>
    </div>
@endsection

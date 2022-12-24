@extends('layouts.layout')

@section('gallery')
    <div class="w-72">
        <a href="/" class="">
            <img src="{{asset('images/logo.png')}}" alt="logo image" class="w-72 mt-10">
        </a>
    </div>
    <section class="flex justify-center">
        <div class="mt-20 relative gallery-container w-4/5 overflow-hidden justify-center flex
        bg-black">
            @foreach ($images as $image)
                <img src="/images/gallery/{{$image}}" alt="{{basename($image)}}" 
                class="gallery-img w-fit">
            @endforeach
            <div class="w-full flex justify-between items-center absolute top-1/2 -translate-y-1/2 
            h-full">
                <button class="text-5xl font-semibold text-white
                gallery-arrow-bg h-full w-20 cursor-default">
                    <i id="galleryBack" class="fa-solid fa-circle-chevron-left cursor-pointer"></i>
                </button>
                <button class="text-5xl font-semibold text-white
                gallery-arrow-bg h-full w-20 cursor-default">
                    <i id="galleryForward" class="fa-solid fa-circle-chevron-right cursor-pointer"></i>
                </button>
            </div>
        </div>
    </section>
    <script src="{{asset('js/gallery.js')}}" defer></script>
@endsection
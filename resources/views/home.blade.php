@extends('layouts.layout')

@section('content')
    {{-- Header-Nav section --}}
    <header>
        @include('partials._navbar')
        <div class="overflow-y-hidden relative z-10 h-full">
            <img src="{{asset('images/home.jpg')}}" alt="home image" class="w-full">
            <strong class="text-white font-semibold text-center
            absolute top-1/2 md:left-10 flex flex-col left-1/2 -translate-x-1/2
            md:translate-x-0 -translate-y-1/2 md:w-fit w-full">
                <span class="text-4xl sm:text-6xl">Wie zu hause</span>
                <span class="text-xl sm:text-3xl">{{__('By reservation only')}}</span>
            </strong>
        </div>
    </header>
    {{-- Dove Siamo --}}
    <section id="where-section" class="bg-white w-full pt-20 px-10">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Where we are'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="mt-20 flex flex-col md:flex-row md:justify-between items-center
        md:space-x-10 md:space-y-0 space-y-10 pb-10 md:pb-0">
            <article class="text-yellow-900 text-2xl w-full text-center">
                Siamo un piccolo agriturismo familiare in provincia di Bergamo.
                Ci troviamo in zona pre-alpina immersi nei boschi dell'Albenza,
                una contrada del comune di Almenno San Bartolomeo.
                Di preciso ci troviamo in Via cabinetti 2, Almenno San Bartolomeo 24030 (BG)
            </article>
            <div id="map" class="w-full h-80 rounded-lg"></div>
        </div>
        {{-- Normal image display --}}
        <div class="xl:flex xl:justify-between w-full mt-16 space-y-5 xl:space-y-0
        px-28 xl:px-0 hidden md:block">
            <img src="{{asset('images/dove_siamo_1.jpg')}}" alt="pictures of the wild" 
            class="xl:w-96 w-full rounded-lg cursor-pointer where-img">
            <img src="{{asset('images/dove_siamo_2.jpg')}}" alt="pictures of the wild" 
            class="xl:w-96 w-full rounded-lg cursor-pointer where-img">
            <img src="{{asset('images/dove_siamo_3.jpg')}}" alt="pictures of the wild" 
            class="xl:w-96 w-full rounded-lg cursor-pointer where-img">
        </div>
        {{-- Carousel image display for mobile --}}
        <div class="w-full relative px-5 block md:hidden h-60 sm:h-96">
            <img src="{{asset('images/dove_siamo_1.jpg')}}" alt="pictures of the wild" 
            class="xl:w-full rounded-lg cursor-pointer where-img mobile-img absolute
            sm:top-0 left-1/2 -translate-x-1/2">
            <img src="{{asset('images/dove_siamo_2.jpg')}}" alt="pictures of the wild" 
            class="w-full rounded-lg cursor-pointer where-img mobile-img absolute
            sm:top-0 left-1/2 -translate-x-1/2">
            <img src="{{asset('images/dove_siamo_3.jpg')}}" alt="pictures of the wild" 
            class="w-full rounded-lg cursor-pointer where-img mobile-img absolute
            sm:top-0 left-1/2 -translate-x-1/2">
        </div>
    </section>
     {{-- Chi Siamo --}}
     <section id="who-section" class="bg-white w-full pt-20 px-10">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Something about us'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="mt-20 flex flex-col md:flex-row md:justify-between items-center
        md:space-y-0 space-y-10 pb-10 md:pb-0 md:flex-row-reverse">
            <article class="text-yellow-900 text-2xl w-full text-center md:text-left md:ml-10">
                L'agriturismo è gestito dalla <b>Sig.ra Herrmann Alexandra</b>, imprenditrice, 
                agricoltrice e chef di origini bavaresi (tedesca di Norimberga), 
                vincintrice della <b>pentola d'oro agnelli</b> coldiretti per l'anno 2014. 
                La chef regala ai suoi ospiti un soggiorno all'insegna della natura e di una 
                ricercata cucina a base di <b>prodotti propri o locali</b>.
                L'agriturismo offre un soggiorno nel pieno relax, 
                ideale anche per un turismo meno giovane, dolcemente accompagnato 
                da un clima mite collinare in tutte le stagioni.
                L'azienda agricola coltiva <b>asparagi e lamponi</b>, produce <b>miele</b> e alleva oche. 
            </article>
            {{-- Add new image to gallery --}}
            @auth
                <div class="ml-10">
                    <form id="new-image-form" action="/gallery/upload" method="POST" class="text-center"
                    enctype="multipart/form-data">
                        @csrf
                        <input id="new-image" type="file" name="image" 
                        onchange="document.getElementById('new-image-form').submit()"
                        class="hidden">
                        <label for="new-image" class="p-2 w-10 h-10 rounded-full bg-yellow-900
                        cursor-pointer flex items-center justify-center">
                            <i class="fa-solid fa-plus text-white text-2xl"></i>
                        </label>
                    </form>
                </div>
            @endauth
            {{-- Image gallery display --}}
            <div class="mt-20 relative gallery-container w-full overflow-hidden justify-center sm:flex
            bg-black h-96 rounded-lg hidden relative">
                @foreach ($images as $image)
                    @auth
                        <form action="/gallery/remove" method="POST" class="absolute top-5 z-20
                        gallery-img-remove">
                            @csrf
                            <input type="hidden" name="imageName" 
                            value="{{$image}}">
                            <button class="flex justify-center items-center p-2 w-10 h-10
                            bg-white rounded-full">
                                <i class="fa-solid fa-xmark cursor-pointer text-yellow-900"></i>
                            </button>
                        </form>
                    @endauth
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
        </div>
        <div class="mt-20 text-center text-yellow-900 text-3xl font-semibold w-full">
            <h2 class="ease-in hover:scale-125 duration-300 w-full cursor-pointer
            sm:underline sm:underline-offset-4">
                <a onclick="goToSection('#contact-section')">
                    {{__('Possibility to book the venue exclusively!')}}
                </a>
            </h2>
        </div>
    </section>
    {{-- Camere --}}
    <section id="rooms-section" class="bg-white w-full pt-20 px-10 relative">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Rooms'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mt-20
        w-full space-y-10 md:space-y-0">
            <div class="flex flex-col">
                <div class="w-full flex justify-center mb-5">
                    <span class="text-yellow-900 text-3xl font-semibold">
                        <i class="fa-solid fa-bed mr-5"></i>
                        {{__('Single')}}
                    </span>
                </div>
                <div class="w-full flex justify-center">
                    <div class="w-1/2">
                        <img src="{{asset('images/singola.jpg')}}" alt="camera singola"
                        class="rounded-lg w-full where-img cursor-pointer">
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="w-full flex justify-center mb-5">
                    <span class="text-yellow-900 text-3xl font-semibold">
                        <i class="fa-solid fa-bed mr-5"></i>
                        {{__('Double')}}
                    </span>
                </div>
                <div class="w-full flex justify-center">
                    <div class="w-1/2">
                        <img src="{{asset('images/doppia.jpg')}}" alt="camera doppia"
                        class="rounded-lg w-full where-img cursor-pointer">
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="w-full flex justify-center mb-5">
                    <span class="text-yellow-900 text-3xl font-semibold">
                        <i class="fa-solid fa-bed mr-5"></i>
                        {{__('Apartment')}}
                    </span>
                </div>
                <div class="w-full flex justify-center">
                    <div class="w-1/2">
                        <img src="{{asset('images/appartamento.jpg')}}" alt="appartamento"
                        class="rounded-lg w-full where-img cursor-pointer">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-20">
            <table class="w-full border-collapse border border-yellow-900 text-xl text-yellow-900">
                <thead>
                <tr class="text-center">
                    <th scope="col" class="border border-yellow-900 py-2">Tipo Camera</th>
                    <th scope="col" class="border border-yellow-900 py-2">Numero Persone</th>
                    <th scope="col" class="border border-yellow-900 py-2">Colazione</th>
                    <th scope="col" class="border border-yellow-900 py-2">Prezzo (a testa)</th>
                </tr>
                </thead>
                <tbody>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Camera Singola</td>
                    <td class="border border-yellow-900 py-2">1</td>
                    <td class="border border-yellow-900 py-2">Esclusa</td>
                    <td class="border border-yellow-900 py-2">100€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Camera Singola</td>
                    <td class="border border-yellow-900 py-2">1</td>
                    <td class="border border-yellow-900 py-2">Inclusa</td>
                    <td class="border border-yellow-900 py-2">120€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Camera Doppia</td>
                    <td class="border border-yellow-900 py-2">2</td>
                    <td class="border border-yellow-900 py-2">Esclusa</td>
                    <td class="border border-yellow-900 py-2">120€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Camera Doppia</td>
                    <td class="border border-yellow-900 py-2">2</td>
                    <td class="border border-yellow-900 py-2">Inclusa</td>
                    <td class="border border-yellow-900 py-2">140€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">2</td>
                    <td class="border border-yellow-900 py-2">Esclusa</td>
                    <td class="border border-yellow-900 py-2">130€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">2</td>
                    <td class="border border-yellow-900 py-2">Inclusa</td>
                    <td class="border border-yellow-900 py-2">140€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">3</td>
                    <td class="border border-yellow-900 py-2">Esclusa</td>
                    <td class="border border-yellow-900 py-2">140€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">3</td>
                    <td class="border border-yellow-900 py-2">Inclusa</td>
                    <td class="border border-yellow-900 py-2">150€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">4</td>
                    <td class="border border-yellow-900 py-2">Esclusa</td>
                    <td class="border border-yellow-900 py-2">180€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">4</td>
                    <td class="border border-yellow-900 py-2">Inclusa</td>
                    <td class="border border-yellow-900 py-2">200€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">5</td>
                    <td class="border border-yellow-900 py-2">Esclusa</td>
                    <td class="border border-yellow-900 py-2">220€</td>
                </tr>
                <tr class="text-center">
                    <td class="border border-yellow-900 py-2">Appartamento</td>
                    <td class="border border-yellow-900 py-2">5</td>
                    <td class="border border-yellow-900 py-2">Inclusa</td>
                    <td class="border border-yellow-900 py-2">250€</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    {{-- Contatti --}}
    <section id="contact-section" class="bg-white w-full py-20 px-10">
        <h2 class="text-yellow-900 font-semibold flex items-center space-x-2
        justify-center text-center">
            <i class="fa-solid fa-circle"></i>
            <p class="text-3xl">{{strtoupper(__('Contact us'))}}</p>
            <i class="fa-solid fa-circle"></i>
        </h2>
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mt-20
        space-y-10 md:space-y-0 pb-10 md:pb-0">
            <div class="w-full text-2xl text-yellow-900 font-semibold md:block flex
            justify-center">
                <div class="w-full text-center w-2/3">
                    <img src="{{asset('images/alexandra.jpg')}}" alt="Alexandra Herrmann"
                    class="rounded-lg w-full mb-5">
                    <q>{{__('The owner')}} Alexandra Herrmann</q>
                </div>
            </div>
            <form action="/send" method="POST" class="w-full flex flex-col space-y-2">
                @csrf
                <label class="text-2xl text-yellow-900" for="name">{{__('Name')}}</label>
                <input id="name" type="text" placeholder="{{__('Name')}}..." name="name" 
                class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-xl">
                <label class="text-2xl text-yellow-900" for="email">{{__('Email')}}</label>
                <input id="email" type="text" placeholder="{{__('Email')}}..." name="email" 
                class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-xl">
                <label class="text-2xl text-yellow-900" for="object">{{__('Subject')}}</label>
                <input id="object" type="text" placeholder="{{__('Subject')}}..." name="subject" 
                class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-xl">
                <label class="text-2xl text-yellow-900" for="message">{{__('Message')}}</label>
                <textarea id="message" placeholder="{{__('Message')}}..." name="msg" 
                class="px-2 py-4 border-2 border-yellow-900 rounded-lg text-xl"></textarea>
                <button class="px-4 py-2 text-white border-2 bg-yellow-900
                border-white hover:border-yellow-500 text-2xl mt-5 rounded-lg
                ease-in duration-300">{{__('Send')}}</button>
            </form>
        </div>
        <div class="xl:flex xl:justify-between w-full mt-16 space-y-5 xl:space-y-0
        px-28 xl:px-0 pb-20 hidden md:block">
            <img src="{{asset('images/biscotti.jpg')}}" alt="biscotti di natale" 
            class="xl:w-96 w-full rounded-lg cursor-pointer where-img">
            <img src="{{asset('images/salone.jpg')}}" alt="sala" 
            class="xl:w-96 w-full rounded-lg cursor-pointer where-img">
            <img src="{{asset('images/veranda.jpg')}}" alt="veranda" 
            class="xl:w-96 w-full rounded-lg cursor-pointer where-img">
        </div>
        <div class="w-full relative px-5 block md:hidden h-60 sm:h-96">
            <img src="{{asset('images/biscotti.jpg')}}" alt="biscotti di natale" 
            class="xl:w-full rounded-lg cursor-pointer where-img mobile-img-footer absolute
            sm:top-0 left-1/2 -translate-x-1/2">
            <img src="{{asset('images/salone.jpg')}}" alt="sala" 
            class="w-full rounded-lg cursor-pointer where-img mobile-img-footer absolute
            sm:top-0 left-1/2 -translate-x-1/2">
            <img src="{{asset('images/veranda.jpg')}}" alt="veranda" 
            class="w-full rounded-lg cursor-pointer where-img mobile-img-footer absolute
            sm:top-0 left-1/2 -translate-x-1/2">
        </div>
        <div class="flex justify-center items-center space-x-10 md:hidden pt-20">
            <a href="https://www.booking.com/hotel/it/agriturismo-al-robale-almenno-san-bartolomeo1.it.html?aid=356980&label=gog235jc-1DCAsocUItYWdyaXR1cmlzbW8tYWwtcm9iYWxlLWFsbWVubm8tc2FuLWJhcnRvbG9tZW8xSAdYA2hxiAEBmAEHuAEXyAEM2AED6AEB-AECiAIBqAIDuAKHy56XBsACAdICJGIyYzU0YjlkLWJhNTMtNDRjMC05NmM5LTZhZmI2OWVmN2IyNtgCBOACAQ&sid=60f28669fda8671b60514e6219ebe352&dist=0&lang=it&room1=A%2CA&sb_price_type=total&soz=1&type=total&lang_click=other&cdl=de&lang_changed=1" target="_blank">
                <img src="{{asset('images/book.jpg')}}" alt="booking" class="w-40
                rounded-lg">
            </a>
            <span class="text-2xl font-semibold text-yellow-900">Prenota con Booking!</span>
        </div>
    </section>
    {{-- Footer section --}}
    @include('partials._footer')
@endsection
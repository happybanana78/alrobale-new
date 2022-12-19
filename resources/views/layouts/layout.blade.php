<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato&family=Shalimar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    @vite('resources/css/app.css')
    <title>Agriturismo Al Robale</title>
</head>
<body>
    <style> @import url('https://fonts.googleapis.com/css2?family=Lato&family=Shalimar&display=swap'); </style>
    @include('partials._image-modal')
    <main class="container mx-auto">
        <header>
            @include('partials._navbar')
            <div class="overflow-y-hidden relative z-10 h-full">
                <img src="{{asset('images/home.jpg')}}" alt="home image" class="w-full">
                <strong class="text-white font-semibold text-center
                absolute top-1/2 left-10 flex flex-col">
                    <span class="text-6xl">Wie zu hause</span>
                    <span class="text-3xl">Solo su prenotazione</span>
                </strong>
            </div>
        </header>
        @yield('content')
        @include('partials._footer')
        <div class="text-5xl fixed bottom-5 right-5 z-30">
            <i class="fa-solid fa-circle-chevron-up text-yellow-900
            cursor-pointer"></i>
        </div>
    </main>


    <script src="{{asset('js/functions.js')}}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE-uJ4DfH7Rq2FfUs2U-tANjDjuIKRmzI&callback=initMap&v=weekly" defer></script>
</body>
</html>
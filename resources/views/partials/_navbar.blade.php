<nav class="flex px-5 py-10 items-center justify-between bg-white
relative top-0 z-20 w-full">
    <a href="/" class="w-1/5">
        <img src="{{asset('images/logo.png')}}" alt="logo image" class="w-full">
    </a>
    <ul class="flex space-x-5 text-2xl font-semibold text-yellow-900">
        <li class="flex flex-col cursor-pointer">
            <a onclick="goToSection('#rooms-section')">Camere</a>
            <span class="bg-yellow-900"></span>
        </li>
        <li class="flex flex-col cursor-pointer">
            <a onclick="goToSection('#where-section')">Dove Siamo</a>
            <span class="bg-yellow-900"></span>
        </li>
        <li class="flex flex-col cursor-pointer">
            <a onclick="goToSection('#contact-section')">Contatti</a>
            <span class="bg-yellow-900"></span>
        </li>
        <li class="flex flex-col cursor-pointer">
            Menù
            <span class="bg-yellow-900"></span>
        </li>
    </ul>
    <button onclick="goToSection('#contact-section')" class="py-2 px-4 font-semibold text-2xl bg-white
    rounded-lg border-2 border-yellow-900 text-yellow-900
    hover:border-white hover:text-white hover:bg-yellow-900 ease-in duration-100">Prenota Ora</button>
</nav>
<nav class="flex px-5 py-10 items-center justify-between bg-white
relative top-0 z-20 w-full">
    <a href="/" class="w-60">
        <img src="{{asset('images/logo.png')}}" alt="logo image" class="w-full">
    </a>
    <ul class="lg:flex space-x-5 text-2xl font-semibold text-yellow-900 relative hidden
    normal-menu">
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
        <li class="flex flex-col cursor-pointer" onclick="unfoldMenu()">
            Menù
            <span class="bg-yellow-900"></span>
        </li>
        {{-- Menu list for admin --}}
        @auth
            <div id="menu-sub-menu" class="flex flex-col space-y-4 text-xl font-semibold
            p-5 absolute right-0 bg-white top-10 h-40 overflow-y-auto hidden rounded-lg">
                @foreach ($menus as $menu)
                    <div class="flex justify-between items-center space-x-10 w-full">
                        <a 
                        href="/docs/{{$menu['menuFullName']}}" 
                        target="_blank">
                            {{$menu['menuName']}}
                        </a>
                        <form action="/menu/remove" method="POST">
                            @csrf
                            <input type="hidden" name="menuName" 
                            value="{{$menu['menuFullName']}}">
                            <button>
                                <i class="fa-solid fa-xmark cursor-pointer"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
                <form id="new-menu-form" action="/menu/upload" method="POST" class="text-center"
                enctype="multipart/form-data">
                    @csrf
                    <input id="new-menu-item" type="file" name="menuItem" 
                    onchange="document.getElementById('new-menu-form').submit()"
                    class="hidden">
                    <label for="new-menu-item" class="px-2 py-1 rounded-full bg-yellow-900
                    cursor-pointer">
                        <i class="fa-solid fa-plus text-white"></i>
                    </label>
                </form>
            </div>
        @endauth
        {{-- Menu list for normal user --}}
        @if (!Auth::check())
            <div id="menu-sub-menu" class="flex flex-col space-y-4 text-xl font-semibold
            p-5 absolute right-0 bg-white top-10 h-40 overflow-y-auto hidden rounded-lg">
                @foreach ($menus as $menu)
                        <a 
                        href="/docs/{{$menu['menuFullName']}}" 
                        target="_blank">
                            {{$menu['menuName']}}
                        </a>
                @endforeach
            </div>
        @endif
    </ul>
    <button 
    onclick="goToSection('#contact-section')" 
    class="py-2 px-4 font-semibold text-2xl bg-white
    rounded-lg border-2 border-yellow-900 text-yellow-900 hidden lg:block
    hover:border-white hover:text-white hover:bg-yellow-900 ease-in duration-100">
        Prenota Ora
    </button>
    {{-- Mobile navbar --}}
    <div class="text-3xl font-semibold text-yellow-900 block lg:hidden">
        <i id="menu-open-btn" onclick="openMenu()"
        class="fa-solid fa-bars cursor-pointer"></i>
        <i id="menu-close-btn" onclick="closeMenu()"
        class="fa-solid fa-xmark cursor-pointer hidden"></i>
    </div>
    <div id="mobile" class="absolute top-28 left-1/2 -translate-x-1/2 bg-white p-5
    w-full rounded-lg mobile-menu hidden">
        <ul class="flex flex-col space-y-5 text-2xl font-semibold text-yellow-900 relative">
            <li class="flex flex-col cursor-pointer text-center">
                <a onclick="goToSection('#rooms-section')">Camere</a>
                <span class="bg-yellow-900"></span>
            </li>
            <li class="flex flex-col cursor-pointer text-center">
                <a onclick="goToSection('#where-section')">Dove Siamo</a>
                <span class="bg-yellow-900"></span>
            </li>
            <li class="flex flex-col cursor-pointer text-center">
                <a onclick="goToSection('#contact-section')">Contatti</a>
                <span class="bg-yellow-900"></span>
            </li>
            <li class="flex flex-col cursor-pointer text-center" onclick="unfoldMenu()">
                Menù
                <span class="bg-yellow-900"></span>
            </li>
            {{-- Menu list for admin --}}
            @auth
                <div id="menu-sub-menu" class="flex flex-col space-y-4 text-xl font-semibold
                p-5 absolute right-0 bg-white top-10 h-40 overflow-y-auto hidden rounded-lg">
                    @foreach ($menus as $menu)
                        <div class="flex justify-between items-center space-x-10 w-full">
                            <a 
                            href="/docs/{{$menu['menuFullName']}}" 
                            target="_blank">
                                {{$menu['menuName']}}
                            </a>
                            <form action="/menu/remove" method="POST">
                                @csrf
                                <input type="hidden" name="menuName" 
                                value="{{$menu['menuFullName']}}">
                                <button>
                                    <i class="fa-solid fa-xmark cursor-pointer"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                    <form id="new-menu-form" action="/menu/upload" method="POST" class="text-center"
                    enctype="multipart/form-data">
                        @csrf
                        <input id="new-menu-item" type="file" name="menuItem" 
                        onchange="document.getElementById('new-menu-form').submit()"
                        class="hidden">
                        <label for="new-menu-item" class="px-2 py-1 rounded-full bg-yellow-900
                        cursor-pointer">
                            <i class="fa-solid fa-plus text-white"></i>
                        </label>
                    </form>
                </div>
            @endauth
            {{-- Menu list for normal user --}}
            @if (!Auth::check())
                <div id="menu-sub-menu" class="flex flex-col space-y-4 text-xl font-semibold
                p-5 absolute right-0 bg-white top-10 h-40 overflow-y-auto hidden rounded-lg">
                    @foreach ($menus as $menu)
                            <a 
                            href="/docs/{{$menu['menuFullName']}}" 
                            target="_blank">
                                {{$menu['menuName']}}
                            </a>
                    @endforeach
                </div>
            @endif
        </ul>
    </div>
</nav>
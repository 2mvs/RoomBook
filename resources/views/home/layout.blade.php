<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RoomBonking | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@section('title', 'Home')

<style>
    #hero{
        background-image: url('./images/chairs.jpg');
        object-fit: contain;
    }
    #hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(106, 108, 114, 0.445); /* Couche sombre */
    z-index: 0;
}
</style>

<body class="bg-slate-50/25 min-h-screen flex flex-col">
    {{-- header section --}}
    {{-- nav section --}}
    <nav class="bg-white shadow-sm w-full fixed top-0 left-0 z-50">
        <div class="max-w-[1100px] mx-auto p-3 flex items-center justify-between">
            <a href="/" class="text-lg text-[#FE4B4B] font-bold">Room<span class="text-neutral-600">Booking.</span></a>
        <ul class="text-sm font-medium flex items-center gap-4">
            <li class="">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-[#FE4B4B] font-bold border-b-2 border-[#FE4B4B]' : 'text-gray-600' }} hover:text-rose-500">Accueil</a>
            </li>
            <li class="">
                <a href="{{route('home.rooms')}}" class="{{ request()->routeIs('home.rooms') ? 'text-[#FE4B4B] font-bold border-b-2 border-rose-500' : 'text-gray-600' }} hover:text-rose-500">Nos salles</a>
            </li>
            <li class="">
                <a href="#" class="{{ request()->routeIs('#') ? 'text-[#FE4B4B] font-bold border-b-2 border-[#FE4B4B]' : 'text-gray-600' }} hover:text-rose-500">À propos</a>
            </li>
            <li class="">
                <a href="#" class="{{ request()->routeIs('#') ? 'text-[#FE4B4B] font-bold border-b-2 border-[#FE4B4B]' : 'text-gray-600' }} hover:text-rose-500">Nous contacter</a>
            </li>
        </ul>
        <div class="flex items-center gap-3 relative">


            @if (!Auth::check())
                <a href="{{ route('login') }}" class="text-sm  text-neutral-600  hover:font-bold">Se
                    connecter
                </a>
                <p class="text-xs text-neutral-400">/</p>
                <a href="{{ route('register') }}" class="text-sm  text-neutral-600  hover:font-bold">
                    Créer un compte
                </a>
            @else
                <di class="flex items-center gap-3">
                    <div class="flex flex-col">
                        <p class="text-xs text-neutral-500">Bienvenue</p>
                        <p class="text-sm font-medium text-neutral-600">{{ auth()->user()->name }}</p>

                    </div>
                    <div id="userAvatar"
                        class="flex items-center bg-zinc-100 justify-center w-10 h-10 rounded-full border border-neutral-400 cursor-pointer">
                        <span class="font-bold">{{ strtoupper(substr(Auth()->user()->name, 0, 1)) }}
                        </span>
                    </div>

                </di>
                <div id="UserMenu"
                    class="hidden absolute right-0 top-[50px] border shadow p-2 bg-white z-10 w-36 rounded-md">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-neutral-500 text-sm hover:text-neutral-700 hover:font-bold">
                            Se déconnecter
                        </button>
                    </form>
                </div>
            @endif
        </div>
        </div>
        
    </nav>
    {{-- end nav section --}}
    
    <main class="">
        @yield('content')
    </main>
    {{-- footer section --}}
    @include('layouts.footer')
    {{-- end footer section --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        const userAvatar = document.getElementById('userAvatar');
        const userMenu = document.getElementById('UserMenu');

        userAvatar.addEventListener('click', (e) => {
            e.stopPropagation();
            userMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', () => {
            userMenu.classList.add('hidden');
        });
    </script>
</body>

</html>

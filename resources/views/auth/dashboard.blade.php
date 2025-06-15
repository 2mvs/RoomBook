<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=power_settings_new" />
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="
    flex items-center justify-between p-3 border-b border-neutral-200 
   ">
        <div class="max-w-[1024px] mx-auto w-full flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-neutral-800">
                Book<span class="text-lg font-bold text-rose-600">Now</span>
            </a>
            <div class="flex gap-4 items-center">
                <a href="{{route('admin.room')}}" class="{{ request()->routeIs('admin.room') ? 'text-rose-600 font-bold border-b-2  border-rose-500' : 'text-gray-600' }} hover:text-rose-600 text-sm">Salles</a>
                <a href="{{ route('category.index') }}"
                        class="{{ request()->routeIs('category.index') ? 'text-rose-600 font-bold border-b-2 text-sm border-rose-500' : 'text-gray-600 hover:font-semibold' }} hover:text-rose-500 text-sm">Category</a>
                <a href="" class="text-neutral-700 text-sm hover:font-semibold hover:text-rose-600">Evenenmets</a>
                <a href="" class="text-neutral-700 text-sm hover:font-semibold hover:text-rose-600">Reservations</a>
            </div>
            <div class="flex gap-3 items-center relative">
                <div class="flex flex-col">
                    <p class="text-sm font-semibold">{{ Auth()->user()->name }}</p>
                    <span class="text-xs text-neutral-500 text-right">{{auth()->user()->role}}</span>
                </div>
                @php
                    $colors = [
                        'bg-red-500',
                        'bg-green-500',
                        'bg-blue-500',
                        'bg-indigo-500',
                        'bg-purple-500',
                        'bg-pink-500',
                        'bg-gray-500',
                    ];
                    $colorIndex = abs(crc32(Auth()->user()->name)) % count($colors);
                    $bgColor = $colors[$colorIndex];
                @endphp
    
                <div id="user-avatar"
                    class="flex items-center justify-center w-10 h-10 rounded-full {{ $bgColor }} text-white font-bold text-lg cursor-pointer hover:bg-opacity-80 transition duration-300 ease-in-out">
                    {{ strtoupper(substr(Auth()->user()->name, 0, 1)) }}
                </div>
                <div id="user-menu" class="hidden absolute top-[50px] right-0 bg-white shadow-md rounded-md p-4 w-48 z-10">
                    <div class="text-sm text-neutral-500 flex items-center gap-3">
                        <span class="material-symbols-outlined text-sm">
                            power_settings_new
                        </span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-neutral-500 text-sm hover:text-neutral-700 hover:font-bold">Se
                                déconnecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="max-w-[1024px] mt-4 mx-auto">
        <h1 class="text-sm text-neutral-400">@yield('title')</h1>
        @if (session('success'))
        <div class="bg-green-50 border border-green-400 flex items-center justify-between text-green-700 px-4 py-3 rounded relative mb-4 transition duration-300" role="alert">
            <span class="block text-sm sm:inline">{{ session('success') }}</span>
            <span class="text-sm text-neutral-500 text-right">x</span>
        </div>
    @endif
        @yield('content')
    </main>
    <script>
        const userMenu = document.getElementById('user-menu');
        const userMenuButton = document.querySelector('#user-avatar');

        userMenuButton.addEventListener('click', () => {
            userMenu.classList.toggle('hidden');
        });

        window.addEventListener('click', (event) => {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>

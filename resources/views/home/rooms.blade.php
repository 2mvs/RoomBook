@extends('home.layout')

@section('title', 'Nos salles')


@section('content')


    <div class="h-[40vh] w-full bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('images/room2.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-4xl mt-10 font-bold">Nos Salles</h1>
        </div>

    </div>

    <div class="max-w-[1100px] mx-auto">
        {{-- section filtre des salles --}}
        <div class="w-full p-4 bg-white border border-stone-200 rounded-md mt-10 shadow-sm">
            @include('layouts.searchRoom')
        </div>
        {{-- fin de la section --}}
        {{-- section categories --}}
        <div class="flex flex-col gap-4 mt-5">
            <h2 class="text-neutral-700 text-lg font-bold">Choisissez le type de salle qui vous intéresse</h2>

            <div class="grid grid-cols-4 w-full gap-4">
                <a href="" class="p-2 rounded-md border border-slate-200 bg-white  flex items-center gap-3">
                    <div class="p-2 border-2 border-stone-100 rounded-full flex items-center justify-center">
                        <img src="{{asset('images/conference.png')}}" alt="" class="w-7 h-7  object-cover">
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-neutral-600 text-sm font-bold capitalize">conférence</h3>
                        <p class="text-xs text-gray-500 font-semibold">3</p>
                    </div>
                </a>
                <a href="" class="p-2 rounded-md border border-slate-200 bg-white  flex items-center gap-3">
                    <div class="p-2 border-2 border-stone-100 rounded-full flex items-center justify-center">
                        <img src="{{asset('images/stage.png')}}" alt="" class="w-7 h-7  object-cover">
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-neutral-600 text-sm font-bold capitalize">Spectacle</h3>
                        <p class="text-xs text-gray-500 font-semibold">1</p>
                    </div>
                </a>
                <a href="" class="p-2 rounded-md border border-slate-200 bg-white  flex items-center gap-3">
                    <div class="p-2 border-2 border-stone-100 rounded-full flex items-center justify-center">
                        <img src="{{asset('images/widding.png')}}" alt="" class="w-7 h-7  object-cover">
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-neutral-600 text-sm font-bold capitalize">Mariage</h3>
                        <p class="text-xs text-gray-500 font-semibold">5</p>
                    </div>
                </a>
                <a href="" class="p-2 rounded-md border border-slate-200 bg-white  flex items-center gap-3">
                    <div class="p-2 border-2 border-stone-100 rounded-full flex items-center justify-center">
                        <img src="{{asset('images/training.png')}}" alt="" class="w-7 h-7  object-cover">
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-neutral-600 text-sm font-bold capitalize">Cours</h3>
                        <p class="text-xs text-gray-500 font-semibold">2</p>
                    </div>
                </a>
                <a href="" class="p-2 rounded-md border border-slate-200 bg-white  flex items-center gap-3">
                    <img src="" alt="" class="w-10 h-10 bg-slate-200 object-cover rounded-full">
                    <div class="flex flex-col">
                        <h3 class="text-neutral-600 text-sm font-bold capitalize">Mariage</h3>
                        <p class="text-xs text-gray-500">2</p>
                    </div>
                </a>
            </div>

        </div>
        {{-- fin de la section --}}
        <div class="grid grid-cols-3 gap-3 mt-8">
            @foreach ($rooms as $room)
            <a href="{{route('home.roomDetails', $room->id)}}">
                <div class="bg-white rounded-md shadow-md">
                    <div class="flex flex-col gap-3">
                        <img src="{{ asset($room->images->first()->path) }}" alt="Image principale"
                            class="w-full h-48 object-cover rounded-t-md">
                        <div class="flex flex-col gap-2 p-4">
                            <h2 class="text-lg text-slate-600 font-bold">{{ $room->name }}</h2>
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                                        <path
                                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                    <p class="text-sm ">{{ $room->location }}</p>
    
                                </div>
                                <div class="flex gap-2 text-slate-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
                                    <p class="text-sm ">{{ $room->capacity }}</p>
                                </div>

                            </div>
                            
                            @php
                                $price = $room->price ?? 500000; // Default to 0 if price is null
                                $formattedPrice = number_format($price, 0, ',', ' ') . ' FCFA';
                            @endphp
                            <div class="flex items-center justify-between">
                                <div class="flex gap-2">
                                    <p class="text-sm text-[#FE4B4B] font-bold">{{ $formattedPrice }}</p>
                                    <p class="text-sm text-slate-500">/ Jour</p>
                                </div>
                                
                            </div>
                            {{-- <p>{{ Str::limit($room->description, 50, '...') }}</p> --}}
                        </div>
                    </div>
                </div>
            </a>
                
            @endforeach

            
        </div>
        <div class="mt-6 flex justify-center">
            {{ $rooms->links() }}
        </div>
    </div>

@endsection

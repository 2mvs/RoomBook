@extends('home.layout')

@section('title', 'Nos salles')


@section('content')




    <div class="h-[40vh] w-full bg-cover bg-no-repeat bg-center relative"
        style="background-image: url('{{ asset('images/room2.jpg') }}');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-4xl mt-10 font-bold">Détail de la salle</h1>
        </div>

    </div>
    @if (session('success'))
        <div id="toast"
            class="fixed flex items-center top-5 right-5 border-l-4 border-green-500 bg-white text-green-500 px-4 py-3 rounded shadow-md transition-opacity duration-500 z-50"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        @error('room_id')
            {{-- <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ $message }}
            </div> --}}
            <div id="toast"
            class="fixed flex items-center top-5 right-5 h-16 border-l-4 border-red-500 bg-white text-red-500 px-4 py-3 transition-opacity duration-500 z-50"
            role="alert">
            {{ $message }}
        </div>
        @enderror
    @endif

    <div class="max-w-[1100px] mx-auto mt-10">
        <div class="w-full mt-10 flex gap-10">
            <section class="w-2/3">
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-5">
                        <h2 class="text-xl font-bold">{{ $room->name }}</h2>

                        <div
                            class="flex items-center text-xs font-bold text-white py-[2px] px-2  bg-green-500 rounded-full  gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-badge-check-icon lucide-badge-check">
                                <path
                                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>

                            <span>Vérifié</span>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="flex items-center gap-2 text-neutral-500 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-house-icon lucide-house">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                <path
                                    d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            </svg>

                            <p class="font-medium">Salle de {{ $room->category->name }}</p>
                        </div>
                        <p class="text-sm text-slate-300">|</p>
                        <div class="flex items-center gap-2 text-neutral-500 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <p class="font-medium">{{ $room->location }}</p>
                        </div>
                        <p class="text-sm text-slate-300">|</p>
                        <div class="flex items-center gap-3 text-xs">
                            <div class="bg-yellow-400 font-bold py-[2px] px-2 rounded-md">
                                4.5
                            </div>
                            <p class="text-sm text-neutral-600">(47 Avis)</p>
                        </div>
                    </div>

                    <div class="">
                        <p class="text-sm text-neutral-600">Capacité maximale <span
                                class="font-bold">{{ $room->capacity }}</span> personnes</p>
                    </div>

                    {{-- section carrousel d'image --}}
                    <div class="w-full mt-5">
                        {{-- Carrousel principal --}}
                        <div class="relative w-full h-[380px] overflow-hidden rounded-md mb-4">
                            <div id="carousel-track" class="flex transition-transform duration-[1600ms] ease-in-out">


                                @foreach ($room->images as $image)
                                    <div class="w-full flex-shrink-0 h-[400px]">
                                        <img src="{{ asset($image->path) }}" class="w-full h-full object-cover bg-center"
                                            alt="Image">
                                    </div>
                                @endforeach
                            </div>

                            {{-- Boutons de navigation --}}
                            <button id="prev-btn"
                                class="absolute left-4 top-1/2 -translate-y-1/2 bg-white text-neutral-700 w-8 h-8 flex items-center justify-center text-xs  rounded-full hover:bg-opacity-75">
                                &#10094;
                            </button>
                            <button id="next-btn"
                                class="absolute right-4 top-1/2 -translate-y-1/2 bg-white text-neutral-700 w-8 h-8 flex items-center justify-center text-xs  rounded-full hover:bg-opacity-75">
                                &#10095;
                            </button>
                        </div>

                        {{-- Miniatures --}}
                        <div class="flex gap-3 overflow-x-auto" id="thumbnails">
                            @foreach ($room->images as $index => $image)
                                <img src="{{ asset($image->path) }}" data-index="{{ $index }}"
                                    class="w-36 h-28 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-blue-400"
                                    alt="Thumbnail">
                            @endforeach
                        </div>
                    </div>

                    {{-- fin de la section carrousel d'image --}}
                    <div class="flex flex-col gap-2 mt-4">
                        <h2 class="text-lg text-neutral-800 font-bold">Description</h2>
                        <div class="w-full">
                            <p class="text-neutral-600">{{ $room->description }}</p>
                        </div>
                    </div>

            </section>
            <section class="w-1/3">
                <div class="">
                    @if (Auth::check())
                        <div class="border border-stone-200 bg-white rounded-md p-4">
                            <div class="">
                                <p class="text-sm text-neutral-600 font-bold">Commence à partir de</p>
                                <div class="flex items-center gap-2">
                                    <h2 class="text-sm text-[#FE4B4B] font-bold">{{ $room->price ?? 500000 }} Fcfa</h2>
                                    <p class="text-sm text-neutral-500">/ Jour</p>
                                </div>
                                <form action="{{ route('reservation.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="room_id" id="" value="{{ $room->id }}">
                                    <div class="mt-4 border border-indigo-100 rounded-md p-2">
                                        <label for="start_date" class="text-sm text-neutral-600 font-bold">Date de
                                            début</label>
                                        <input type="date" name="check_in" id=""
                                            class="w-full rounded-md p-2 mt-2 cursor-pointer outline-none"
                                            placeholder="Date de début" value="{{ date('Y-m-d') }}" required>
                                        @error('check_in')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-4 border border-indigo-100 rounded-md p-2">
                                        <label for="start_date" class="text-sm text-neutral-600 font-bold">Date de
                                            fin</label>
                                        <input type="date" name="check_out" id=""
                                            class="w-full rounded-md p-2 mt-2 outline-none" placeholder="Date de début"
                                            value="{{ date('Y-m-d') }}" required>
                                    </div>

                                    <div class="flex items-center justify-center mt-3">
                                        <button
                                            class="py-3 px-4 bg-red-500 text-white font-semibold rounded-full w-full">Réservez
                                            Maintenant</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col gap-2 bg-white shadow-md rounded-md p-4 mt-28">
                            <h2 class="text-lg text-neutral-800 font-bold">Réserver cette salle</h2>
                            <p class="text-sm text-neutral-500">Connectez-vous pour réserver cette salle.</p>
                            <a href="{{ route('login') }}"
                                class="bg-[#FE4B4B] text-white py-2 px-4 rounded-md text-center">Se connecter</a>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('carousel-track');
            const thumbnails = document.querySelectorAll('#thumbnails img');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const totalImages = thumbnails.length;

            let activeIndex = 0;

            function updateCarousel(index) {
                const percentage = index * -100;
                track.style.transform = `translateX(${percentage}%)`;
                thumbnails.forEach((thumb, i) => {
                    thumb.classList.toggle('border-blue-500', i === index);
                });
            }

            thumbnails.forEach((thumb) => {
                thumb.addEventListener('click', () => {
                    activeIndex = parseInt(thumb.dataset.index);
                    updateCarousel(activeIndex);
                });
            });

            prevBtn.addEventListener('click', () => {
                activeIndex = (activeIndex === 0) ? totalImages - 1 : activeIndex - 1;
                updateCarousel(activeIndex);
            });

            nextBtn.addEventListener('click', () => {
                activeIndex = (activeIndex + 1) % totalImages;
                updateCarousel(activeIndex);
            });

            // Init
            updateCarousel(activeIndex);
        });

        setTimeout(() => {
            const toast = document.getElementById('toast');
            toast.classList.add('opacity-0');
        }, 3000);
    </script>


@endsection

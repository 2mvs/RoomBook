@extends('home.layout')


@section('title', 'Accueil')

@section('content')
    @php
        $salles = [
            [
                'name' => 'Mariage',
                'image' => '/images/widding.png',
            ],
            [
                'name' => 'Reunion',
                'image' => '/images/meeting.png',
            ],
            [
                'name' => 'Cours',
                'image' => '/images/training.png',
            ],
            [
                'name' => 'Spectacle',
                'image' => './images/stage.png',
            ],
        ];
        $url = './images/salle2.jpg';
    @endphp
    {{-- hero section --}}
    <div id="hero"
        class="relative px-16 w-full flex items-center justify-center flex-col h-[70vh] gap-3 bg-cover bg-center bg-no-repeat">
        <h1 class="text-6xl text-center text-[#FE4B4B] w-2/3 font-extrabold m-4 z-10">Trouvez la salle idéale
            pour chaque occasion </h1>
        <p class="text-white text-center w-2/3 font-bold text-3xl z-10">Des espaces uniques pour tous vos événements :
            mariages, soirées, séminaires et plus encore.</p>
        <div
            class="bg-white border border-neutral-300 rounded-md flex items-center gap-3 shadow-sm absolute w-[60%] p-4 bottom-[-32px] z-10">
            @foreach ($salles as $salle)
                <div class="p-2 flex gap-4 items-center hover:bg-neutral-200 w-1/4 rounded-md">
                    <img src="{{ $salle['image'] }}" alt="" class="w-[20px] h-[20px]">
                    <p>{{ $salle['name'] }}</p>
                </div>
                @if (!$loop->last)
                    <span class="text-gray-400">|</span>
                @endif
            @endforeach
        </div>
    </div>
    {{-- end hero section --}}

    {{-- main section  --}}
    <div class="max-w-[1100px] mt-[110px] mx-auto">
        <h1 class="text-2xl text-neutral-700 font-semibold">Popular rooms</h1>
        <div class="mt-3 flex gap-3">
            <div class="flex flex-col gap-2 w-1/4">
                <img src="./images/salle2.jpg" alt="" class="h-[200px] rounded-t-lg">
                <p>Grande salle </p>
            </div>
            <div class="flex flex-col gap-2 w-1/4">
                <img src="./images/chairs.jpg" alt="" class="h-[200px] rounded-t-lg">
                <p>Grande salle </p>
            </div>
            <div class="flex flex-col gap-2 w-1/4">
                <img src="./images/room2.jpg" alt="" class="h-[200px] rounded-t-lg">
                <p>Grande salle </p>
            </div>
            <div class="flex flex-col gap-2 w-1/4">
                <img src="./images/tables.jpg" alt="" class="h-[200px] rounded-t-lg">
                <p>Grande salle </p>
            </div>
        </div>

    </div>
    {{-- end main section --}}

@endsection

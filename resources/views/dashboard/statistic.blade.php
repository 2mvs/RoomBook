@extends('auth.dashboard')


@section('title', 'Dashboard')

@section('content')

@php
$counteItem = [
    'Rooms' => $countRoom,
    'events' => 8,
    'reservations' => $countBooking,
    'users' => $countUser,
];
@endphp
    <h1 class="text-neutral-700 font-semibold">Welcome back {{Auth()->user()->name}}</h1>
    <div class="">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
            @foreach ($counteItem as $key => $value)
                <div class="bg-white shadow-sm rounded-sm p-4 odd:bg-rose-50 even:bg-sky-50">
                    <h2 class="text-lg text-neutral-600 font-semibold capitalize">{{ $key }}</h2>
                    <p class="flex items-center justify-center w-10 h-10 bg-white rounded-full text-xl text-neutral-600 font-bold">{{ $value }}</p>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection
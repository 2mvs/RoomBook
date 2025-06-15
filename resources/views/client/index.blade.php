@extends('layouts.app')


@section('title', 'Reservation')

@section('content')
   <div class="">
    <h1 class="mt-4 text-sm text-neutral-600 font-bold">
        Welcome back {{auth()->user()->name}}
     </h1>
     <form action="{{ route('logout') }}" method="POST">
         @csrf
         <button type="submit" class="text-neutral-500 text-sm hover:text-neutral-700 hover:font-bold">Se
             déconnecter</button>
     </form>
   </div>
@endsection
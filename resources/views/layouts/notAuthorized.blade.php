@extends('layouts.app')


@section('title', 'Not Authorized')


@section('content')

    <div class="h-screen flex flex-col gap-3 items-center justify-center">
        <h1 class="text-5xl text-neutral-600 font-bold">Not Authorized</h1>
        <a href="{{route('home')}}" class="text-sm font-semibold underline underline-offset-4 text-blue-500">Go back to the home page</a>
    </div>
    
@endsection
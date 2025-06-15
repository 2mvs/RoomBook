@extends('auth.dashboard')


@section('title', 'Room/Edit')

@section('content')
    <div class="mt-4 flex-1">
        <form action="{{route('room.update', $room->id)}}" method="POST" class="flex flex-col space-y-3 bg-white p-4 shadow-sm">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label for="name" class="text-sm text-neutral-600 {{ $errors->has('name') ? 'text-red-500' : '' }}">Libelle</label>
                    <input type="text" id="name" name="name" placeholder="Beau Lieu" class="text-sm text-neutral-600 rounded-md p-2 border outline-none {{$errors->has('name') ? 'border-red-500': ''}}" value="{{$room->name}}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="capacity" class="text-sm text-neutral-600 {{ $errors->has('capacity') ? 'text-red-500' : '' }}">Capacité</label>
                    <input type="text" id="capacity" name="capacity" placeholder="300" class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{$errors->has('capacity') ? 'border-red-500': ''}}" value="{{$room->capacity}}">
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label for="location" class="block text-sm text-neutral-600 {{ $errors->has('location') ? 'text-red-500' : '' }}">Localisation</label>
                    <input type="text" id="location" name="location" placeholder="Angodje" class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{$errors->has('location') ? 'border-red-500': ''}}" value="{{$room->location}}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="status" class="text-sm text-neutral-600 {{ $errors->has('status') ? 'text-red-500' : '' }}">Statut</label>
                    <select 
                        id="status" 
                        name="status" 
                        required
                        class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{$errors->has('status') ? 'border-red-500': ''}}"
                    >
                        <option value="inactive" {{ old('status', $status ?? 'inactive') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="active" {{ old('status', $status ?? 'inactive') === 'active' ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label for="description" class="text-sm text-neutral-600 {{ $errors->has('description') ? 'text-red-500' : '' }}">Description</label>
                <textarea name="description" id="description" class="text-sm text-neutral-600 p-2 border outline-none rounded-md {{$errors->has('description') ? 'border-red-500': ''}}">{{ $room->description }}
                </textarea>
                @error('description')
                   <p class="text-red-500"> {{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 rounded-md text-white text-sm font-semibold p-2">Soumettre</button>
            </div>
            
        </form>
    </div>
@endsection
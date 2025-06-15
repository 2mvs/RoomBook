@extends('auth.dashboard')

@section('title', 'Category/Add')

@section('content')
    <div class="mt-4 flex-1">
        <form action="{{ route('category.store') }}" method="POST" class="flex flex-col space-y-3 bg-white p-4 shadow-sm"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label for="name"
                        class="text-sm text-neutral-600 {{ $errors->has('name') ? 'text-red-500 font-medium' : '' }}">Libelle</label>
                    <input type="text" id="name" name="name" placeholder="Conférence" value="{{ old('name') }}"
                        class="text-sm text-neutral-600 rounded-md p-2 border outline-none {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                </div>   
            </div>

            <div class="flex flex-col gap-1">
                <label for="description"
                    class="text-sm text-neutral-600 {{ $errors->has('description') ? 'text-red-500 font-medium' : '' }}">Description</label>
                <textarea name="description" id="description"
                    class="text-sm text-neutral-600 p-2 border outline-none rounded-md {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-500 rounded-md text-white text-sm font-semibold p-2">Soumettre</button>
            </div>
        </form>
    </div>


    <script>
        
    </script>
@endsection

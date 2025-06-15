@extends('auth.dashboard')

@section('title', 'Room/Add')

@section('content')
    <div class="mt-4 flex-1">
        <form action="{{ route('room.post') }}" method="POST" class="flex flex-col space-y-3 bg-white p-4 shadow-sm"
            enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-3 gap-4">
                <div class="flex flex-col gap-1">
                    <label for="name"
                        class="text-sm text-neutral-600 {{ $errors->has('name') ? 'text-red-500 font-medium' : '' }}">Libelle</label>
                    <input type="text" id="name" name="name" placeholder="Beau Lieu" value="{{ old('name') }}"
                        class="text-sm text-neutral-600 rounded-md p-2 border outline-none {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="category_id" class="text-sm text-neutral-600 {{ $errors->has('name') ? 'text-red-500 font-medium' : '' }}">Categotie</label>
                    <select name="category_id" id="" class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }}">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="name"
                        class="text-sm text-neutral-600 {{ $errors->has('price') ? 'text-red-500 font-medium' : '' }}">Prix</label>
                    <input type="text" id="price" name="price" placeholder="10 000" value="{{ old('price') }}"
                        class="text-sm text-neutral-600 rounded-md p-2 border outline-none {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }}">
                </div>
                
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="flex flex-col gap-1">
                    <label for="location"
                        class="block text-sm text-neutral-600 {{ $errors->has('location') ? 'text-red-500 font-medium' : '' }}">Localisation</label>
                    <input type="text" id="location" name="location" placeholder="Angodje" value="{{ old('location') }}"
                        class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{ $errors->has('location') ? 'border-red-500' : 'border-gray-300' }}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="capacity"
                        class="text-sm text-neutral-600 {{ $errors->has('capacity') ? 'text-red-500 font-medium' : '' }}">Capacité</label>
                    <input type="text" id="capacity" name="capacity" placeholder="300" value="{{ old('capacity') }}"
                        class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{ $errors->has('capacity') ? 'border-red-500' : 'border-gray-300' }}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="status"
                        class="text-sm text-neutral-600 {{ $errors->has('status') ? 'text-red-500 font-medium' : '' }}">Statut</label>
                    <select id="status" name="status" required
                        class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{ $errors->has('status') ? 'border-red-500' : 'border-gray-300' }}">
                        <option value="inactive"
                            {{ old('status', $status ?? 'inactive') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="active" {{ old('status', $status ?? 'inactive') === 'active' ? 'selected' : '' }}>
                            Active</option>
                    </select>
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
            <div class="flex flex-col gap-1">
                <label for="images">Images de la salle</label>
                <input type="file" name="images[]" id="images"
                    class="text-sm rounded-md text-neutral-600 p-2 border outline-none {{ $errors->has('images') ? 'border-red-500' : 'border-gray-300' }}"
                    multiple>

                <div id="preview" class="flex gap-3 mt-4 flex-wrap"></div>
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-500 rounded-md text-white text-sm font-semibold p-2">Soumettre</button>
            </div>
        </form>
    </div>


    <script>
        document.getElementById('images').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            preview.innerHTML = '';

            Array.from(e.target.files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.className = 'w-32 h-32 object-cover rounded border shadow';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection

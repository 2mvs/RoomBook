<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un compte</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="h-screen flex justify-center items-center bg-gray-50">
    <div class="flex flex-col">
        <form action="{{ route('register.post') }}" method="POST" class="bg-white p-6 rounded shadow-md w-96">
            @csrf
            <div class="mb-4">
                <h1 class="text-lg font-bold text-slate-800">Créer un compte</h1>
                <p class="text-sm text-gray-600">Veuillez remplir le formulaire ci-dessous</p>
            </div>
            <div class="mb-4">
                <label for="name"
                    class="block text-sm text-gray-700 {{ $errors->has('name') ? 'text-red-500' : '' }}">Nom</label>
                <input type="text" name="name" id="name"
                    class="border outline-none rounded w-full py-2 px-3 {{ $errors->has('name') ? 'border-red-500' : '' }}"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email"
                    class="block text-sm text-gray-700 {{ $errors->has('email') ? 'text-red-500' : '' }}">Email</label>
                <input type="email" name="email" id="email"
                    class="border outline-none rounded w-full py-2 px-3 {{ $errors->has('email') ? 'border-red-500' : '' }}"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password"
                    class="block text-sm text-gray-700 {{ $errors->has('password') ? 'text-red-500' : '' }}">Mot de
                    passe</label>
                <input type="password" name="password" id="password"
                    class="border outline-none rounded w-full py-2 px-3 {{ $errors->has('password') ? 'border-red-500' : '' }}">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation"
                    class="block text-sm text-gray-700 {{ $errors->has('password_confirmation') ? 'text-red-500' : '' }}">Confirmer
                    le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="border outline-none rounded w-full py-2 px-3 {{ $errors->has('password_confirmation') ? 'border-red-500' : '' }}">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-neutral-700 text-white py-2 px-4 rounded">Créer un compte</button>
            <div class="mt-4 text-sm text-gray-600">
                <p>Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-blue-500">Se connecter</a></p>
        </form>
    </div>
</body>

</html>

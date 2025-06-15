<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Rules\TrustedEmailDomain;
use Illuminate\Http\Request;
use App\Mail\emails\WelcomeEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (auth()->attempt($request->only('email', 'password'))) {
            return match(auth()->user()->role) {
                'admin' => redirect()->intended('dashboard'),
                default => redirect()->intended(),
            };
        }
        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ]);

    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Vous êtes déconnecté.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','string','email','max:255','unique:users', new TrustedEmailDomain()],
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($request->password !== $request->password_confirmation) {
            return back()->withErrors([
                'password' => 'Les mots de passe ne correspondent pas.',
            ]);
        }
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->intended('dashboard');
        }

        $role = 'user';
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('login')->with('success', 'Inscription réussie. Un email de bienvenue a été envoyé.');
    }

    public function showUdateForm()
    {
        return view('auth.update');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profil mis à jour avec succès.');
    }
    public function delete(Request $request)
    {
        $user = auth()->user();
        $user->delete();

        return redirect('/')->with('success', 'Compte supprimé avec succès.');
    }
}

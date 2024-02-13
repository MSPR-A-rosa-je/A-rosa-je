<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Récupérer les données du formulaire
        $credentials = $request->only('email', 'password');

        // Récupérer l'utilisateur par email
        $user = User::where('email', $credentials['email'])->first();

        // Vérifier si l'utilisateur existe et que le mot de passe correspond au hash
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Authentification réussie, connecter l'utilisateur
            Auth::login($user);
            log($user);


            // Rediriger vers la page d'accueil
            return redirect('/welcome');
        } else {
            // Informations incorrectes, rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            echo('connectionSubs');
        }
        catch (
            \Throwable $exception
        ){return "";}
        // Récupérer les données du formulaire
        $email = $request->input('email');
        $password = $request->input('password');

        // Vérifier les informations dans la base de données
        $user = DB::table('users')->where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            // Authentification réussie
            return redirect()->route('/');
        } else {
            // Informations incorrectes, rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
}

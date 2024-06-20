<?php

namespace App\Http\Controllers;

use App\Models\User;


class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user = User::where('id', $user->id)->first();
        return view('front.account.index', compact('user'));
    }


// Supprimer un compte
    public function destroy(\http\Client\Curl\User $user)
    {
        $user = auth()->user();
        if ($user->user_id === $user->id) {
            $user->delete();
        }
        return redirect()->route('plants.index.blade.php');
    }
}

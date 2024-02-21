<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{

    protected  $redirectTo = RouteServiceProvider::HOME;

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'pseudo' => 'required|string|max:25|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'birth_date' => 'required|date',
            'url_picture' => 'nullable|string|max:255',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = new User;
        $user->pseudo = $validatedData['pseudo'];
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->phone_number = $validatedData['phone_number'];
        $user->email = $validatedData['email'];
        $user->birth_date = $validatedData['birth_date'];
        $user->url_picture = $validatedData['url_picture'];
        $user->zip_code = $validatedData['zip_code'];
        $user->city = $validatedData['city'];
        $user->address = $validatedData['address'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect('/welcome')->with('success', 'User created successfully!');
    }
}

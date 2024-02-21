<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function showPasswordResetForm()
    {
        return view('password-reset');
    }
}

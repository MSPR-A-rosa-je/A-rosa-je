<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        $users = User::select('first_name', 'last_name', 'id')->where('id', '!=', Auth::user()->id)->get();
        return view('front/chat/index', compact('users'));
    }

    public function show(int $id){
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plant;
use App\Models\Mission;

class HomeController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $plantCount = Plant::count();
        $missionCount = Mission::count();

        return view('home', compact('userCount', 'plantCount', 'missionCount'));
    }
}

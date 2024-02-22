<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Plant;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $userCount    = User::count();
        $plantCount   = Plant::count();
        $missionCount = Mission::count();

        return view('back.home', compact('userCount', 'plantCount', 'missionCount'));
    }
}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>ADMIN PANEL</title>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<header class="header">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('assets/pictures/logo2.png') }}" alt="logo"/>
            <p>Sabota'je</p>
        </a>
        <!-- Sabota'je -->
    </div>
    <nav aria-label="Main">
        <ul>
            <li class="list"><a href="#">Missions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Chat</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<header class="h-20 header">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('assets/pictures/logo.png') }}" alt="logo"/>
        </a>
    </div>
    <nav class="header-nav" aria-label="Main">
        <ul class="h-20">
            <li class="h-20 list"><a href="#">Missions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                </ul>
            </li>
            <li class="h-20 list"><a href="#">Chat</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

    <div id="bloc-cnx-hd" class="flex-class-center">
        @if (Auth::guest())
            <p>Log in</p>
            <i class="fa-solid fa-circle-user"></i>
        @else
            <p>{{Auth::user()->pseudo}}</p>
            <i class="fa-solid fa-circle-user"></i>
        @endif
    </div>

    <div id="bloc-cnx">
        <ul>
        @if (Auth::guest())
            <li><a href="#">Sign in</a></li>
            <li><a href="#">Log in</a></li>
        @else
            <li><a href="#">My Account</a></li>
            <li><a href="#">Log out</a></li>
        @endif
        </ul>
    </div>

    <div id="burger-menu">
        <div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</header>

<div class="message-container">
    @if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif
</div>


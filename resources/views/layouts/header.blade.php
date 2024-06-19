<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Arosa-Je - @yield('title')</title>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

<header class="h-20 header">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('assets/pictures/logo.png') }}"/>
        </a>
    </div>
    <nav class="header-nav">
        <ul class="h-20">
            <li class="h-20 list">
                <a href="{{ route('front.plants.index') }}">Plants</a>
                <ul class="under">
                    <li><a href="{{ route('front.plants.index') }}">My Plants</a></li>
                    <li><a href="{{ route('front.plants.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="h-20 list"><a href="#">Missions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                </ul>
            </li>
            <li></li>
            <li></li>
            <li></li>
            <li class="h-20"><a href="{{ route('chat') }}">Chat</a>
            </li>
        </ul>
    </nav>

    <div id="bloc-cnx-hd" class="flex-class-center">
        @if (Auth::guest())
        <nav class="header-nav">
            <ul class="h-20">
                <li class="h-10 list"><a class="profil" href="{{ route('login') }}"><p>Log in</p>
                        <i class="fa-solid fa-circle-user"></i></a>
                    <ul class="under">
                        <li><a href="{{ route('register') }}">Sign in</a></li>
                        <li><a href="{{ route('login') }}">Log in</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        @else
        <nav class="header-nav">
            <ul class="h-20">
                <li class="h-10 list"><a class="profil" href=""><p>{{Auth::user()->pseudo}}</p>
                        <i class="fa-solid fa-circle-user"></i></a>
                    <ul class="under">
                        <li><a  href="#">My Account</a></li>
                        <li> <a class="dropdown-item" href="{{route('logout')}}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{route('logout')}}" method="POST">
                                @csrf
                            </form></li>
                    </ul>
                </li>
            </ul>
        </nav>
        @endif
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


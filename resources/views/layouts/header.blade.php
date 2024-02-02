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
            <img src="{{ asset('assets/pictures/logo2.png') }}"/>
            <p>Sabota'je</p>
        </a>
        <!-- Sabota'je -->
    </div>
    <nav>
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
                </ul>
            </li>
        </ul>
    </nav>
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

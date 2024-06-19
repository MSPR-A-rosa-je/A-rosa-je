<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>ADMIN PANEL</title>
    <link href="{{ asset('assets/back/css/app.css') }}" rel="stylesheet">
</head>
<header class="card">
    <h1 class="logo"><a href="/home">Admin panel</a></h1>
    <nav>
        <ul>
            <li class="list" style="width: 12%"><a href="{{ route('users.index') }}">Users</a>
                <ul class="under">
                    <li><a href="{{ route('users.index') }}">View</a></li>
                    <li><a href="{{ route('users.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list" style="width: 12%"><a href="{{ route('back.plants.index.blade.php') }}">Plants</a>
                <ul class="under">
                    <li><a href="{{ route('back.plants.index.blade.php') }}">View</a></li>
                    <li><a href="{{ route('back.plants.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list" style="width: 12%"><a href="{{ route('missions.index') }}">Missions</a>
                <ul class="under">
                    <li><a href="{{ route('missions.index') }}">View</a></li>
                    <li><a href="{{ route('missions.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list" style="width: 12%"><a href="{{ route('advices.index') }}">Advices</a>
                <ul class="under">
                    <li><a href="{{ route('advices.index') }}">View</a></li>
                    <li><a href="{{ route('advices.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list" style="width: 12%"><a href="{{ route('sessions.index') }}">Sessions</a>
                <ul class="under">
                    <li><a href="{{ route('sessions.index') }}">View</a></li>
                    <li><a href="{{ route('sessions.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list" style="width: 12%"><a href="{{ route('addresses.index') }}">Addresses</a>
                <ul class="under">
                    <li><a href="{{ route('addresses.index') }}">View</a></li>
                    <li><a href="{{ route('addresses.create') }}">Create</a></li>
                </ul>
            <li class="list" style="width: 12%"><a href="#">Settings</a>
                <ul class="under">
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Informations</a></li>
                    <li><a href=/log-viewer>Logs Dashboard</a></li>
                    <li><a href="/benchmark">Benchmarks</a></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logout-form" class="hidden">
                            @csrf
                        </form>
                        <a href="#" class="list" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                    </li>
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

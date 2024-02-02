<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>ADMIN PANEL</title>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<header class="card">
    <h1 class="logo"><a href="/home">Admin panel</a></h1>
    <nav>
        <ul>
            <li class="list"><a href="#">Users</a>
                <ul class="under">
                    <li><a href="{{ route('users.index') }}">View</a></li>
                    <li><a href="{{ route('users.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Plants</a>
                <ul class="under">
                    <li><a href="{{ route('plants.index') }}">View</a></li>
                    <li><a href="{{ route('plants.create') }}">Create</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Missions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Advices</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Sessions</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </li>
            <li class="list"><a href="#">Addresses</a>
                <ul class="under">
                    <li><a href="#">View</a></li>
                    <li><a href="#">Create</a></li>
                    <li><a href="#">Update</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            <li class="list"><a href="#">Settings</a>
                <ul class="under">
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Informations</a></li>
                    <li><a href=/log-viewer>Logs Dashboard</a></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logout-form" class="hidden">
                            @csrf
                        </form>
                        <a href="#" class="list" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

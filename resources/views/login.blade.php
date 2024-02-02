<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <!-- Styles -->
</head>

<div class="container">
    <div class="left-side">
        <button class="cancel-button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M7.07 7.07l9.17 9.17M7.07 16.24L16.24 7.07" fill="none" stroke="#ffffff" stroke-width="2"/>
            </svg></button>
        <div class="centered-content">
            <form action="/login" method="post">
            <div class="wave-group">
                <input required="" type="email" class="input"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}">
                <span class="bar"></span>
                <label class="label">
                    <span class="label-char" style="--index: 1">E</span>
                    <span class="label-char" style="--index: 2">m</span>
                    <span class="label-char" style="--index: 3">a</span>
                    <span class="label-char" style="--index: 4">i</span>
                    <span class="label-char" style="--index: 5">l</span>
                </label>
            </div>
            <br>
            <div class="wave-group">
                <input required="" type="password" class="input">
                <span class="bar"></span>
                <label class="label">
                    <span class="label-char" style="--index: 1">P</span>
                    <span class="label-char" style="--index: 2">a</span>
                    <span class="label-char" style="--index: 3">s</span>
                    <span class="label-char" style="--index: 4">s</span>
                    <span class="label-char" style="--index: 5">w</span>
                    <span class="label-char" style="--index: 6">o</span>
                    <span class="label-char" style="--index: 7">r</span>
                    <span class="label-char" style="--index: 8">d</span>
                </label>
            </div>

            <button id="Validate-button" class="gradient-button" type="submit">Validate</button>
        </div>
        <div class="bottom-link">
            <a href="">Create account</a>
            <a href="">Forgot password?</a>
        </div>
    </div>
    <div class="center-line"></div>
    <div class="right-side">
        <div class="image-overlay">Good to see you again</div>
        <img src="{{ asset('assets/pictures/log_background.jpg') }}">
    </div>
</div>


</body>
</html>

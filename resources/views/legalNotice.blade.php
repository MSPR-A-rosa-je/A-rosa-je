<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath d='M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM9 15v-2H8v2H5V5h2V3h2v2h2v10h-2v-2H9v2zm5-10h-2V3h2v2zm0 10h-2v2h-2v-2H7v2H5v-2H3v-2h2V7H3V5h2V3h2v2h2v10h-2v-2h-2v2H7v-2H5v2H3v-2h2v-2h2v2h2v-2h2v2h2V5h-2V3h2V1h-2V0z' fill='%2300FF00'/%3E%3C/svg%3E" type="image/svg+xml">

    <title>Arosa-je</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <!-- Styles -->
</head>
<body>
<div class="container">
    <div class="left-side">
    </div>
    <div class="center-line"></div>
    <div class="right-side">
        <div class="image-overlay">Good to see you again</div>
        <img src="{{ asset('assets/pictures/jungle_background.jpg') }}">
    </div>
</div>


</body>
</html>

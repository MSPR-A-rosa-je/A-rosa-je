<!DOCTYPE html>
@section('title', 'Home')
@include('layouts/header')

<section class="container mx-auto content-center">
    <img class="m-auto" src="{{ asset('assets/pictures/Arosa-je.png') }}">
</section>

<section id="accueil-img-1" class="grid grid-cols-2 gap-4 accueil-bg-img">
    <div class="col-end-3 col-span-1 p-5 m-14 bgc-white-transp">
        <h3 class="text-center">Who are we?</h3>
        <p>Lorem ipsum dolor sodo sit amet tatane, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<section class="grid grid-cols-3 gap-4 h-40">
    <h2 class="col-end-3 col-span-1 m-auto">Short description of utilisation</h2>
</section>

<section id="accueil-img-2" class="grid grid-cols-2 gap-4 accueil-bg-img">
    <div class="col-end-0 col-span-1 p-5 m-14 bgc-white-transp">
        <h3 class="text-center">Create or log</h3>
        <p>Lorem ipsum dolor sodo sit amet tatane, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<section class="grid grid-cols-3 gap-4 h-40">
    <h2 class="col-end-3 col-span-1 m-auto">Short text about trust</h2>
</section>

<section id="accueil-img-3" class="accueil-bg-img">
</section>

@include('layouts/footer')

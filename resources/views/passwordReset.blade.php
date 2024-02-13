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
        <button class="cancel-button" onclick="window.location.href='/login'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M7.07 7.07l9.17 9.17M7.07 16.24L16.24 7.07" fill="none" stroke="#ffffff" stroke-width="2"/>
            </svg></button>
        <div class="centered-content">
            <form id="emailForm" action="/login" method="get">
                <div class="wave-group">
                    <input required="" type="email" class="input" id="email" name="email" oninput="compareEmails()">
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
                    <input required="" type="email" class="input" id="confirmEmail" name="confirm_email" oninput="compareEmails()">
                    <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 1">C</span>
                        <span class="label-char" style="--index: 2">o</span>
                        <span class="label-char" style="--index: 3">n</span>
                        <span class="label-char" style="--index: 4">f</span>
                        <span class="label-char" style="--index: 5">i</span>
                        <span class="label-char" style="--index: 6">r</span>
                        <span class="label-char" style="--index: 7">m</span>
                        <span class="label-char" style="--index: 8">a</span>
                        <span class="label-char" style="--index: 9">t</span>
                        <span class="label-char" style="--index: 10">i</span>
                        <span class="label-char" style="--index: 11">o</span>
                        <span class="label-char" style="--index: 12">n</span>
                    </label>
                </div>
                <p id="passwordError" style="color: red;"></p>
                <button id="Validate-button" class="gradient-button" type="submit">Validate</button>
            </form>
        </div>
    </div>
    <div class="center-line"></div>
    <div class="right-side">
        <div class="image-overlay">You have a memory lapse?</div>
        <img src="{{ asset('assets/pictures/log_background.jpg') }}">
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var emailForm = document.getElementById("emailForm");
        var emailInput = document.getElementById("email");
        var error = document.getElementById("passwordError");
        var confirmEmailInput = document.getElementById("confirmEmail");
        var validateButton = document.getElementById("Validate-button");

        // Ajoute un événement input sur le formulaire
        emailForm.addEventListener("input", function() {
            var email = emailInput.value;
            var confirmEmail = confirmEmailInput.value;

            // Vérifie si les adresses email correspondent
            if (email !== confirmEmail) {
                // Désactive le bouton si les adresses ne correspondent pas
                error.innerText = "Emails address do not match.";
                validateButton.disabled = true;
            } else {
                // Active le bouton si les adresses correspondent
                validateButton.disabled = false;
                error.innerText = "";
            }
        });
    });
</script>

</body>

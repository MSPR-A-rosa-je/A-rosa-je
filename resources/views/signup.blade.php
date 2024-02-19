<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ asset('assets/css/signup.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath d='M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM9 15v-2H8v2H5V5h2V3h2v2h2v10h-2v-2H9v2zm5-10h-2V3h2v2zm0 10h-2v2h-2v-2H7v2H5v-2H3v-2h2V7H3V5h2V3h2v2h2v10h-2v-2h-2v2H7v-2H5v2H3v-2h2v-2h2v2h2v-2h2v2h2V5h-2V3h2V1h-2V0z' fill='%2300FF00'/%3E%3C/svg%3E"
          type="image/svg+xml">

    <title>Arosa-je</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <!-- Styles -->
</head>
<body>
<div class="container">
    <div class="left-side">
        <button class="cancel-button" onclick="window.location.href='/login'">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M7.07 7.07l9.17 9.17M7.07 16.24L16.24 7.07" fill="none" stroke="#ffffff" stroke-width="2"/>
            </svg>
        </button>
        <div class="centered-content">
            <form id="signUpForm" action="/signup" method="post">
                @csrf
                <div class="wave-group">
                    <input required="" type="email" class="input"
                           pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" name="email">
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
                    <input required="" type="text" class="input"
                           pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}">
                    <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 1">P</span>
                        <span class="label-char" style="--index: 2">s</span>
                        <span class="label-char" style="--index: 3">e</span>
                        <span class="label-char" style="--index: 4">u</span>
                        <span class="label-char" style="--index: 5">d</span>
                        <span class="label-char" style="--index: 6">o</span>
                    </label>
                </div>
                <br>
                <div class="container" id="specific-container">
                    <div class="wave-group">
                        <input required="" type="text" class="input"
                        <span class="bar"></span>
                        <label class="label">
                            <span class="label-char" style="--index: 1">F</span>
                            <span class="label-char" style="--index: 2">i</span>
                            <span class="label-char" style="--index: 3">r</span>
                            <span class="label-char" style="--index: 4">s</span>
                            <span class="label-char" style="--index: 5">t</span>
                            <span class="label-char" style="--index: 1">n</span>
                            <span class="label-char" style="--index: 2">a</span>
                            <span class="label-char" style="--index: 3">m</span>
                            <span class="label-char" style="--index: 4">e</span>
                        </label>
                    </div>
                    <div class="wave-group">
                        <input required="" type="text" class="input"
                        <span class="bar"></span>
                        <label class="label">
                            <span class="label-char" style="--index: 1">L</span>
                            <span class="label-char" style="--index: 2">a</span>
                            <span class="label-char" style="--index: 3">s</span>
                            <span class="label-char" style="--index: 4">t</span>
                            <span class="label-char" style="--index: 1">n</span>
                            <span class="label-char" style="--index: 2">a</span>
                            <span class="label-char" style="--index: 3">m</span>
                            <span class="label-char" style="--index: 4">e</span>
                        </label>
                    </div>
                </div>
                <br>
                <br>
                <div class="container" id="specific-container">
                    <div class="wave-group">
                        <input required="" type="text" class="input"
                        <span class="bar"></span>
                        <label class="label">
                            <span class="label-char" style="--index: 1">C</span>
                            <span class="label-char" style="--index: 2">i</span>
                            <span class="label-char" style="--index: 3">t</span>
                            <span class="label-char" style="--index: 4">y</span>
                        </label>
                    </div>
                    <div class="wave-group">
                        <input required="" type="text" class="input"
                        <span class="bar"></span>
                        <label class="label">
                            <span class="label-char" style="--index: 1">Z</span>
                            <span class="label-char" style="--index: 2">i</span>
                            <span class="label-char" style="--index: 3">p</span>
                            <span class="label-char" style="--index: 1">c</span>
                            <span class="label-char" style="--index: 2">o</span>
                            <span class="label-char" style="--index: 3">d</span>
                            <span class="label-char" style="--index: 4">e</span>
                        </label>
                    </div>
                </div>
                <br>

                <br>
                <div class="wave-group">
                    <input required="" type="text" class="input">
                    <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 1">A</span>
                        <span class="label-char" style="--index: 2">d</span>
                        <span class="label-char" style="--index: 3">d</span>
                        <span class="label-char" style="--index: 4">r</span>
                        <span class="label-char" style="--index: 5">e</span>
                        <span class="label-char" style="--index: 6">s</span>
                        <span class="label-char" style="--index: 7">s</span>
                    </label>
                </div>
                <br>
                <div class="wave-group">
                    <input required="" type="text" class="input">
                    <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 1">P</span>
                        <span class="label-char" style="--index: 2">h</span>
                        <span class="label-char" style="--index: 3">o</span>
                        <span class="label-char" style="--index: 4">n</span>
                        <span class="label-char" style="--index: 5">e</span>
                        <span class="label-char" style="--index: 1">n</span>
                        <span class="label-char" style="--index: 2">u</span>
                        <span class="label-char" style="--index: 3">m</span>
                        <span class="label-char" style="--index: 4">b</span>
                        <span class="label-char" style="--index: 5">e</span>
                        <span class="label-char" style="--index: 6">r</span>
                    </label>
                </div>
                <br>
                <br>

                <div class="container" id="specific-container">
                    <input required="" type="date" class="input" id="birthdate-input" placeholder="birthdate">
                    <div class="wave-group">
                        <input required="" type="file" class="input" id="picture-input">
                        <span class="bar"></span>
                    </div>
                </div>
                <br>
                <div class="wave-group">
                    <input required="required" type="password" class="input" name="password"
                           oninput="comparePasswords()">
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
                <br>
                <div class="wave-group">
                    <input required="" type="password" class="input" name="confirmation" oninput="comparePasswords()">
                    <span class="bar"></span>
                    <label class="label">
                        <span class="label-char" style="--index: 1">C</span>
                        <span class="label-char" style="--index: 2">o</span>
                        <span class="label-char" style="--index: 3">n</span>
                        <span class="label-char" style="--index: 4">f</span>
                        <span class="label-char" style="--index: 5">i</span>
                        <span class="label-char" style="--index: 6">r</span>
                        <span class="label-char" style="--index: 7">m</span>
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
                <p id="passwordError" style="color: red;"></p>
                <br>
                <div class="container" id="validation-container">
                    <div class="container" id="condition-container">
                        <label class="switch">
                            <input checked="" type="checkbox">
                            <div class="slider">
                                <div class="circle">
                                    <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512"
                                         viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path data-original="#000000" fill="currentColor"
                                              d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766 0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25 0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152 113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0 45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247 0l113.132-113.132L295.99 356.32c12.503 12.5 32.769 12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0">
                                        </path>
                                    </g>
                                </svg>
                                    <svg class="checkmark" xml:space="preserve"
                                         style="enable-background:new 0 0 512 512"
                                         viewBox="0 0 24 24" y="0" x="0" height="10" width="10"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path class="" data-original="#000000" fill="currentColor"
                                              d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z">
                                        </path>
                                    </g>
                                </svg>
                                </div>
                            </div>
                        </label>
                        <button class="transparent">condition of use</button>
                    </div>
                    <button id="Validate-button" class="gradient-button" type="submit">Validate</button>
                </div>
        </div>
    </div>
    <div class="right-side">
        <div class="image-overlay">We are happy to have you among us</div>
        <img src="{{ asset('assets/pictures/log_background.jpg') }}">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var passwordInput = document.querySelector('input[name="password"]');
        var confirmPasswordInput = document.querySelector('input[name="confirmation"]');
        var error = document.getElementById("passwordError");

        function comparePasswords() {
            var password = passwordInput.value;
            var confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword) {
                error.innerText = "Passwords do not match.";
            } else {
                error.innerText = "";
            }
        }

        passwordInput.addEventListener("input", comparePasswords);
        confirmPasswordInput.addEventListener("input", comparePasswords);
    });
</script>


</body>
</html>

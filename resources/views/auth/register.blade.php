<head>
    <title>Register</title>
    <link href="{{ asset('assets/css/signup.css') }}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg'
          viewBox='0 0 20 20'%3E%3Cpath d='M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48
          10-10S15.52 0 10 0zM9 15v-2H8v2H5V5h2V3h2v2h2v10h-2v-2H9v2zm5-10h-2V3h2v2zm0
          10h-2v2h-2v-2H7v2H5v-2H3v-2h2V7H3V5h2V3h2v2h2v10h-2v-2h-2v2H7v-2H5v2H3v-2h2v-
          2h2v2h2v-2h2v2h2V5h-2V3h2V1h-2V0z' fill='%2300FF00'/%3E%3C/svg%3E"
          type="image/svg+xml">

</head>

@section('content')

<body>
<div class="container">
    <div class="left-side">
        <button class="cancel-button" onclick="window.location.href='/'">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M7.07 7.07l9.17 9.17M7.07 16.24L16.24 7.07" fill="none" stroke="#ffffff" stroke-width="2"/>
            </svg>
        </button>
        <div class="centered-content">
            <form id="signUpForm" action="{{route('store')}}" method="post">
                @csrf
                <div class="wave-group">
                    <input required="" maxlength="50" type="email"
                    class="input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           id="email" name="email"
                           value="{{old('email') ?? ''}}">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email')}}</span>
                    @endif
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
                    <input required="" maxlength="50" type="text"
                           class="input {{ $errors->has('pseudo') ? 'is-invalid' : '' }}"
                           id="pseudo" name="pseudo"
                           value="{{old('pseudo')}}">
                    @if ($errors->has('pseudo'))
                    <span class="text-danger">{{ $errors->first('pseudo')}}</span>
                    @endif
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
                </br>
                <div class="wave-group">
                    <input maxlength="50" required="" type="text"
                           class="input {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                           id="first_name"
                           name="first_name" value="{{old('first_name')}}">
                    @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name')}}</span>
                    @endif
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
                <br>
                <div class="wave-group">
                    <input required="" maxlength="50" type="text"
                           class="input {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                           id="last_name" name="last_name" value="{{old('last_name')}}">
                    @if ($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name')}}</span>
                    @endif <span class="bar"></span>
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
                <br>
                <div class="wave-group">
                    <input required type="date" class="input {{ $errors->has('birth_date') ? 'is-invalid' : '' }}"
                           id="birth_date"
                           name="birth_date" value="{{old('birth_date')}}">
                    @if ($errors->has('birth_date'))
                    <span class="text-danger">{{ $errors->first('birth_date')}}</span>
                    @endif
                </div>


                <br>

                <div class="wave-group">
                    <input required="required" type="password" class="input
                    {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           id="password" name="password" minlength="8"
                           oninput="comparePasswords()" value="{{old('password')}}">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password')}}</span>
                    @endif
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
                    <input required="" type="password" class="input" name="confirmation" id="confirmation" minlength="8"
                           oninput="comparePasswords()">
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
                            <input checked="" type="checkbox" required="">
                            <div class="slider">
                                <div class="circle">
                                    <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512"
                                         viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path data-original="#000000" fill="currentColor"
                                              d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766
                                               0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25
                                                0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247
                                                 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152
                                                  113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0
                                                   45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247
                                                    0l113.132-113.132L295.99 356.32c12.503 12.5 32.769
                                                     12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0">
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
                                              d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5
                                               1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9
                                                14.171l9.525-9.525a1.5 1.5 0 0 1 2.121
                                                 0l.707.707a1.5 1.5 0 0 1 0 2.121z">
                                        </path>
                                    </g>
                                </svg>
                                </div>
                            </div>
                        </label>
                        <button class="transparent">condition of use</button>
                    </div>
                    <button id="Validate-button" class="gradient-button" value="Register" type="submit">Validate
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="right-side">
        <div class="image-overlay">We are happy to have you among us</div>
        <img src="{{ asset('assets/pictures/log_background.jpg') }}" alt="background">
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

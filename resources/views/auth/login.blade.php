@section('content')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3E%3Cpath d='M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM9 15v-2H8v2H5V5h2V3h2v2h2v10h-2v-2H9v2zm5-10h-2V3h2v2zm0 10h-2v2h-2v-2H7v2H5v-2H3v-2h2V7H3V5h2V3h2v2h2v10h-2v-2h-2v2H7v-2H5v2H3v-2h2v-2h2v2h2v-2h2v2h2V5h-2V3h2V1h-2V0z' fill='%2300FF00'/%3E%3C/svg%3E"
          type="image/svg+xml">
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="left-side">
        <button class="cancel-button" onclick="window.location.href='/welcome.blade.php'">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M7.07 7.07l9.17 9.17M7.07 16.24L16.24 7.07" fill="none" stroke="#ffffff" stroke-width="2"/>
            </svg>
        </button>
        <div class="centered-content">
            <form action="{{route('authenticate')}}" method="post">
                @csrf
                <div class="wave-group">
                    <input required="" type="email" class="input @error('email') is-invalid @enderror" id="email"
                           name="email" value="{{old('email')}}">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
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
                    <input type="password" required="" class="input @error('password') is-invalid @enderror"
                           id="password" name="password" value="{{old('password')}}">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
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
                <button id="Validate-button" class="gradient-button" type="submit" value="Login">Validate</button>
        </div>
        <div class="bottom-link">
            <button onclick="window.location.href='/register'">Create account</button>
            <button onclick="window.location.href='/passwordReset'">Forgot password?</button>
        </div>
    </div>
    <div class="right-side">
        <div class="image-overlay">Good to see you again</div>
        <img src="{{ asset('assets/pictures/log_background.jpg') }}">
    </div>
</div>
</body>
</html>

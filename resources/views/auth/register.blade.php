@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form action="{{route('store')}}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="pseudo" class="col-md-4 col-form-label text-md-end text-start">Pseudo</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('pseudo') is-invalid @enderror" id="pseudo" name="pseudo" value="{{old('pseudo')}}">
                        @if ($errors->has('pseudo'))
                            <span class="text-danger">{{ $errors->first('pseudo')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="first_name" class="col-md-4 col-form-label text-md-end text-start">First Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{old('first_name')}}">
                        @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="last_name" class="col-md-4 col-form-label text-md-end text-start">Last Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{old('last_name')}}">
                        @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="birth_date" class="col-md-4 col-form-label text-md-end text-start">Birth Date</label>
                    <div class="col-md-6">
                        <input type="date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{old('birth_date')}}">
                        @if ($errors->has('birth_date'))
                        <span class="text-danger">{{ $errors->first('birth_date')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"></input>
                    </div>
                </div>
                <div class="mb-3 row">
                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

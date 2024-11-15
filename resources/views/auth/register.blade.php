{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}





@extends('layouts.app')

@section('content')
<p style="color: white ; text-align:center ; margin : 20px 2px 5px">already User ? <a href="/login">Login Here</a></p>
<div class="sign__content">
    <!-- authorization form -->
    <form action="{{ route('register') }}" method="post">
         @csrf
        <a href="/" class="sign__logo">
            <img src="img/logo.svg" alt="">
        </a>
        <div class="sign__group">
            <input type="text" name="name"  class="sign__input" placeholder="name" value="{{old('name')}}">
            @error('name')
            <p style="color: red ; margin :5px 0px">{{$message}}</p>
        @enderror
        </div>

        <div class="sign__group">
            <input type="email" name="email"  class="sign__input" placeholder="Email" value={{old('email')}}>
            @error('email')
            <p style="color: red ; margin :5px 0px">{{$message}}</p>
        @enderror
        </div>

        <div class="sign__group">
            <input type="password"  name="password"  class="sign__input" placeholder="Password">
            @error('password')
            <p style="color: red ; margin :5px 0px">{{$message}}</p>
        @enderror
        </div>
        <div class="sign__group">
            <input type="password"  class="sign__input" name="password_confirmation" required autocomplete="new-password" placeholder="confirm Password">
        </div>



        <button type="submit" class="sign__btn" type="button">Register</button>


    </form>
    <!-- end authorization form -->
</div>

@endsection

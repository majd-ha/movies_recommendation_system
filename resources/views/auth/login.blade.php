@extends('layouts.app')

@section('content')
<p style="color: white ; text-align:center ; margin : 20px 2px 5px"> New member ? <a href="/register">Register Here</a></p>
<div class="sign__content">
    <!-- authorization form -->
    <form action="{{ route('login') }}" method="post">
         @csrf
        <a href="/" class="sign__logo">
            <img src="img/logo.svg" alt="">
        </a>

        <div class="sign__group">
            <input type="email" name="email"  class="sign__input" placeholder="Email" value="{{old('email')}}">
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

        <div class="sign__group sign__group--checkbox">
            <input id="remember" name="remember" type="checkbox" checked="checked">
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit" class="sign__btn" type="button">Sign in</button>


    </form>
    <!-- end authorization form -->
</div>

@endsection

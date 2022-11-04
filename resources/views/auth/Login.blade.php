@extends('layouts.app')

@section('content')
<div class="login-container">
  <div class="login-container__center">
    <h1>{{ __('Iniciar sesion') }}</h1>
    <form method="POST" action="{{ route('login') }}" class="login-forms">
      @csrf
      <label for="email" class="label">{{ __('Correo electronico') }}</label>
      <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus>

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <label for="password" class="label">{{ __('Contrasenia') }}</label>
      <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password"
        required autocomplete="current-password">

      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <button type="submit" class="btn btn-login">
        {{ __('Iniciar Sesion') }}
      </button>
    </form>
    <a href="{{route('register')}}" class="btn-register__container">
      <button class="btn">Registrarse</button>  
    </a>
  </div>
</div>
@endsection
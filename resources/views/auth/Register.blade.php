@extends('layouts.app')

@section('content')
<div class="login-container">
  <div class="login-container__center">
    <h1>{{ __('Register') }}</h1>
    <form method="POST" action="{{ route('register') }}" class="login-forms">
      @csrf
      <label for="name" class="label">{{ __('Nombre usuario') }}</label>
      <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name"
        value="{{ old('name') }}" required autocomplete="name" autofocus>

      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror

      <label for="email" class="label">{{ __('Correo electronico') }}</label>
      <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email">

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror

      <label for="password" class="label">{{ __('Contrasenia') }}</label>
      <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password"
        required autocomplete="new-password">

      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror

      <label for="password-confirm" class="label">{{ __('Confirmar contrasenia')
        }}</label>
      <input id="password-confirm" type="password" class="input" name="password_confirmation" required
        autocomplete="new-password">

      <button type="submit" class="btn btn-login">
        {{ __('Registrarse') }}
      </button>
    </form>
    <a href="{{route('login')}}" class="btn-register__container">
      <button class="btn">Iniciar Sesion</button>  
    </a>
  </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
  <title>LogIn</title>
</head>
<body>
  <div class="login-container">
    <div class="login-container__center">
      <h1 class="login-tite">Iniciar sesion</h1>
      <form action="" class="login-forms">
        <label for="username" class="label label-user">Usuario:</label>
        <input 
          type="text" 
          class="input username-input" 
          name="username" 
          placeholder="Ingrese nombre de usuario"
          autocomplete="off"
        >
        <label for="password" class="label label-password">Contraseña:</label>
        <input 
          type="password" 
          class="input password-input" 
          name="password" 
          placeholder="Ingrese contraseña"
          autocomplete="off"
        >
        <button class="btn btn-login">
          Inciar sesion
        </button>
        <a href="/register" class="btn-register__container">
          <button type="button" class="btn btn-register">
            Registrarse
          </button>
        </a>
      </form>
    </div>
  </div>
</body>
</html>
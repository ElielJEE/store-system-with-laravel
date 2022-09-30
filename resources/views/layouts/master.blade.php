<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="main-container">
    <header class="header-container">
      <div class="header-content">
        <div class="header-content__title">
          <h1 class="header-title">
            Titulo
          </h1>
        </div>
        <div class="header-content__username-container">
          <span class="username">
            @juan
          </span>
        </div>
      </div>
    </header>
    <div class="container">
      <aside class="sidebar-container">
        <div class="sidebar-content">
          <div class="sidebar-content__list">
            <ul class="sidebar-list">
              <li class="sidebar-list__item">
                Inicio
              </li>
              <li class="sidebar-list__item">
                Facturacion
              </li>
              <li class="sidebar-list__item">
                Productos
              </li>
              <li class="sidebar-list__item">
                Categorias
              </li>
              <li class="sidebar-list__item">
                Clientes
              </li>
            </ul>
          </div>
          <div class="sidebar-content__btn">
            <button class="btn btn-logout">
              <span class="btn-text">Cerrar sesion</span>
            </button>
          </div>
        </div>
      </aside>
      <div class="center-container">
        @yield('content')
      </div>
    </div>
  </div>
</body>
</html>
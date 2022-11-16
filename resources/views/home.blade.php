@extends('layouts.master')

@section('content')
<div class="container-home">
    <div class="container-centered__home">
        <h1 class="home-welcome">
            Bienvenido
            @auth()
            @ {{ auth()->user()->name }}
            @endauth
        </h1>
        <ul class="home-list">
            <li class="home-list__item">
                <a href="{{route('facturation.create')}}" class="list-item__link">
                    Facturacion
                </a>
            </li>
            <li class="home-list__item">
                <a href="{{route('products.index')}}" class="list-item__link">
                    Productos
                </a>
            </li>
            <li class="home-list__item">
                <a href="{{route('categorie.index')}}" class="list-item__link">
                    Categorias
                </a>
            </li>
            <li class="home-list__item">
                <a href="{{route('customers.index')}}" class="list-item__link">
                    Clientes
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection
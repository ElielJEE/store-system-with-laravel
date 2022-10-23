@extends('layouts.master')

@section('content')
    <div class="categories-container">
        <form action="{{route('categorie.update', $categoria)}}" class="categorie-form" method="POST">
            @csrf
            @method('put')
            <label for="name" class="category-label label">Nombre categoria*</label>
            <input type="text" class="input input-category" name="name" placeholder="Ingresar nombre de categoria" value="{{$categoria->nombre_categoria}}">
            <button class="btn send-btn">
                Agregar
            </button>
        </form>
    </div>
@endsection
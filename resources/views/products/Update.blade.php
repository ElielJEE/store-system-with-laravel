@extends('layouts.master')

@section('content')
    <div class="categories-container">
        <form action="{{route('products.update')}}" class="categorie-form" method="POST">
            @csrf
            @method('put')
            <label for="name" class="category-label label">Nombre Producto*</label>
            <input type="text" class="input input-category" name="name" placeholder="Ingresar nombre de producto" value="{{old('name')}}">
            
            <label for="price" class="category-label label">Precio Producto*</label>
            <input type="number" class="input input-category" name="price" placeholder="Ingresar precio de producto" value="{{old('price')}}">

            <label for="categoria" class="category-label label">Nombre categoria*</label>
            <select name="categoria" class="form-control" value="{{old('categoria')}}">
                @foreach($categories as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>           
                @endforeach
            </select> 
            <button class="btn send-btn">
                Actualizar
            </button>
        </form>
    </div>
@endsection
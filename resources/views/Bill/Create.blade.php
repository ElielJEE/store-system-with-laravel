@extends('layouts.master')

@section('content')
<div class="bill-container">
	<div class="page-title__container">
		<h2 class="page-title">Facturacion</h2>
	</div>
	<div class="bill-content">
		<div class="bill-form__container">
			
			<form action="{{route('facturation.store')}}" class="customer-form" method="POST">
				@csrf
				<div class="form-container">
					<h4 class="form-title">Cliente Datos</h4>
					<div class="form-content">
						<label for="customer_name" class="label customer-name">Cliente:</label>
						<input type="text" class="input customer-input" name="customer_name"
							placeholder="Ingrese nombre del cliente" autocomplete="off" value="{{old('customer_name')}}">
						@error('client')
						<span>{{$message}}</span>
						@enderror
					</div>
				</div>
				<div class="form-container">
					<h4 class="form-title">Datos Factura</h4>
					<div class="form-content">
						<label for="date" class="label date-label">Fecha:</label>
						<input type="date" class="input date-input" name="date" autocomplete="off" value="{{old('date')}}">
					</div>
				</div>
				<div class="form-container">
					<button class="btn btn-save" type="submit">
						Guardar factura
					</button>
				</div>
			</form>
			<div class="form-container">
				<form action="{{route('cancelVent')}}" method="POST">
					@method('delete')
					@csrf
					<button class="btn btn-delete">
						Eliminar factura
					</button>
				</form>
			</div>
		</div>
		<div class="table-container">
			<form class="table-container__header" action="{{route('addProduct')}}" method="post">
				@csrf
				@method('post')
				<label for="producto" class="label">Producto:</label>
				<select class="input search-input" placeholder="Buscar producto" name="producto">
					@foreach ($productos as $product)
					<option value="{{$product->id}}">
						{{$product->nombre_producto}}
					</option>
					@endforeach
				</select>
				<label for="cant" class="label">Cantidad: </label>
				<input type="number" class="input" name="cant" value="{{old('cant')}}">
				<button type="submit" class="btn">
					<span>Agregar Producto</span>
				</button>
			</form>
			<div class="table-content">
				@if(session('productos'))
				<table class="bill-table" cellspacing='0'>
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Subtotal</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						@foreach (session('productos') as $i => $producto)
						<tr>
							<td>{{$producto[0]->id}}</td>
							<td>{{$producto[0]->nombre_producto}}</td>
							<td>{{$producto['cantidad']}}</td>
							<td>{{$producto[0]->precio_producto}}</td>
							<td>{{ (int) $producto['cantidad'] * (int) $producto[0]->precio_producto}}</td>
							<td>
								<form action="{{route('deleteProductToVent')}}" method="POST">
									@method('delete')
									@csrf
									<input type="hidden" name="indice" value="{{$loop->index}}">
									<button type="submit" class="btn-delete__product">
										<span>Eliminar</span>
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endif
			</div>
		</div>
		@if(session('total'))
		<div class="footer-table__container">
			<div class="footer-content total-bill__container">
				<p class="total-bill">
					Total: <strong>C$ {{session('total')}}</strong>
				</p>
			</div>
		</div>
		@endif
	</div>
	@include('components.Error')
</div>
@endsection
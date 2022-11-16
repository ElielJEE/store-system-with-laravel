@if (session()->has('success'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<strong>Listo!</strong> {{ session()->get('success') }}
	<a href="{{ route('generateReport') }}" target="_blank">Generar Reporte</a>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
@if (isset($errors) && $errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>Algo no va bien</strong>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
@if (session()->has('add'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<strong>Listo</strong> {{ session()->get('add') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
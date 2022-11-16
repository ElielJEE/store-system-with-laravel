<head>
	<style>
		.title {
			text-transform: uppercase;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
		}

		.subtitle {
			margin: 5px;
		}

		.text-center {
			text-align: center;
		}

		.factur-client__bottom {
			position: relative;
			top: 40px;
		}

		.head-factur__client {
			font-size: 1.1rem;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
		}

		.head-factur__bold {
			font-weight: bold;
		}

		.head-factur__isClient {
			font-weight: 200;
		}

		.table-data thead {
			background-color: rgba(8, 8, 8, 0.486);
		}

		.table-data thead {
			font-weight: bold;
		}

		.table-data tr,
		.table-data td,
		.table-data thead,
		.table-data tbody,
		.table-data {
			font-size: 1.1rem;
			font-family: monospace;
			padding: 5px;
			border: 1px solid black;
			border-collapse: collapse;
		}

		.table-data__factur {
			padding: 10px 0;
		}

		.table-data__factur-item {
			font-size: 1.1rem;
			padding: 10px 0;
			font-family: monospace;
		}

		.table-data__total {
			text-align: right;
		}

		.table-data__total>span {
			font-weight: bold;
			padding-right: 90px;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
		}

		.factura-number {
			display: block;
			text-align: center;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
		}

		.head-date {
			text-align: right;
		}
	</style>
</head>
<div>
	<h1 class="title text-center">Factura Variedades Lacrimosa</h1>
	<h3 class="title subtitle text-center">Ofreciendo productos de todo tipo, articulos escolares, vestimenta, alimenticios, agropecuarios, para fiestas, etc.</h3>

	<span class="factura-number">N° Factura: {{ $factura->id }}</span>
	<p class="head-factur__client factur-client__bottom">
		<span class="head-factur__bold">
			Cliente:
		</span>
		<span class="head-factur__isClient">{{ $cliente->nombre_cliente }}</span>
	</p>
	<p class="head-factur__client head-date">
		<span class="head-factur__bold">
			Fecha:
		</span>
		<span class="head-factur__isClient">{{ $factura->fecha_factura }}</span>
	</p>
	<table class="table-data table-data__factur" id="dataTable" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th class="table-data__factur-item">#</th>
				<th class="table-data__factur-item">CANT</th>
				<th class="table-data__factur-item">DESCRIPCION</th>
				<th class="table-data__factur-item">P. UNIT</th>
				<th class="table-data__factur-item">TOTAL</th>
			</tr>
		</thead>
		<tbody class="table-data__factur-item">
			@foreach ($productos as $i => $producto)
			<tr>
				<th class="table-data__factur-item">{{ $producto[0]->id }}</p>
				<th class="table-data__factur-item">{{ $producto['cantidad'] }}</th>
				<th class="table-data__factur-item">{{ $producto[0]->nombre_producto }}</th>
				<th class="table-data__factur-item">C$ {{ $producto[0]->precio_producto }}</th>
				<th class="table-data__factur-item">C$
					{{ (int) $producto['cantidad'] * (int) $producto[0]->precio_producto }}</th>
			</tr>
			@endforeach
		</tbody>
		<tfoot class="table-data__factur-item">
			<tr>
				<td class="table-data__factur-item table-data__total" COLSPAN="5">
					<span>Total C$ {{ $total }}</span>
				</td>
			</tr>
		</tfoot>
	</table>
	<p class="text-center">¡Gracias por su compra, vuelva pronto!</p>
</div>
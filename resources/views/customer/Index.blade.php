@extends('layouts.master')

@section('content')
<div class="customer-container">
    <table class="customers-table" cellspacing='0'>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->nombre_cliente}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
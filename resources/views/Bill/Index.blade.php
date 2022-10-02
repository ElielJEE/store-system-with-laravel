@extends('layouts.master')

@section('content')
<div class="bill-container">
  <div class="page-title__container">
    <h2 class="page-title">Facturacion</h2>
  </div>
  <div class="bill-content">
    <div class="bill-form__container">
      <form action="" class="customer-form">
        <div class="form-container">
          <h4 class="form-title">Cliente Datos</h4>
          <div class="form-content">
            <label for="customer-name" class="label customer-name">Cliente:</label>
            <input 
              type="text" 
              class="input customer-input" 
              name="customer-name" 
              placeholder="Ingrese nombre del cliente"
              autocomplete="off"
            >
          </div>
          <div class="btn-form__container">
            <button class="btn search-customer__btn">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
              Buscar
            </button>
            <button class="btn new-customer__btn">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
              Nuevo
            </button>
          </div>
        </div>
        <div class="form-container">
          <h4 class="form-title">Datos Factura</h4>
          <div class="form-content">
            <label for="date" class="label date-label">Fecha:</label>
            <input 
              type="date" 
              class="input date-input" 
              name="date"
              autocomplete="off"
            >
          </div>
          <div class="info-bill__container">
            <p class="info-bill">
              N°Factura: <strong>00001</strong>
            </p>
          </div>
        </div>
      </form>
    </div>
    <div class="table-container">
      <div class="table-container__header">
        <input 
          type="search" 
          class="input search-input"
          placeholder="Buscar producto"
          autocomplete="off"
        >
      </div>
      <div class="table-content">
        <table class="bill-table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Subtotal</th>
              <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1234</td>
              <td>Coca-Cola</td>
              <td>10</td>
              <td>17</td>
              <td>80</td>
              <td>NO</td>
            </tr>
            <tr>
              <td>1234</td>
              <td>Coca-Cola</td>
              <td>10</td>
              <td>17</td>
              <td>80</td>
              <td>NO</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="footer-table__container">
      <div class="footer-content btns-bill__container">
        <button class="btn btn-save">
          Guardar factura
        </button>
        <button class="btn btn-delete">
          Eliminar factura
        </button>
      </div>
      <div class="footer-content total-bill__container">
        <p class="total-bill">
          Total: <strong>C$1990</strong>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
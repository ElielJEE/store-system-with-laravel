<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacturaRequest;
use App\Models\Factura;
use App\Models\Customer;
use App\Models\Factura_Detalle;
use App\Models\product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = product::all();
        return view('Bill.Create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaRequest $request)
    {
        try {
            $request->validated();
            $client = new Customer();
            $client->nombre_cliente=$request->customer_name;
            $client->save();

            $factura = new Factura();
            $factura->fk_cliente = $client->id;
            $factura->fecha_factura = $request->date;
            $factura->total_factura=session('total');
            $factura->save();

            foreach (session('productos') as $producto) {
                $detalleFactura = new Factura_Detalle();
                $detalleFactura->fk_factura = $factura->id;
                $detalleFactura->fk_producto = $producto[0]->id;
                $detalleFactura->cantidad = $producto["cantidad"];
                $detalleFactura->save();
            }

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('factura.reports', ['factura' => $factura, 'productos' => session('productos'), 'cliente' => $client, 'total' => session('total')]);

            session(['data' => array('productos' => session('productos'), 'cliente' => $client, 'total' => session('total'), 'factura' => $factura)]);

            session(['total' => null]);
            session(['productos' => null]);

            return redirect()->route('facturation.create')->withSuccess('Facturacion Exitosa');

        } catch (Exception $e) {
            return redirect()->route('facturation.create')->withErrors("Ha ocurrido un error al finilizar la factura");
        }
    }

    public function generateReport() {
        $data = session('data');
        $pdf = app::make('dompdf.wrapper');
        $pdf->loadView('facturas.reports', ['productos' => $data['productos'], 'factura' => $data['factura']]);
        return $pdf->stream();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}

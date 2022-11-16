<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\Factura;
use App\Models\Customer;
use App\Models\Factura_Detalle;

class FacturacionController extends Controller
{
    public function gettotal(){
        $total=0;
        foreach ($this->getproducts() as $producto) {
            $total += $producto["cantidad"] * $producto[0]->precio_producto;
        }
        return $total;
    }

    function getproducts(){
        $productos=session("productos");
        if (!$productos) {
            $productos=[];
        }
        return $productos;
    }

    public function addproductToVent(Request $request){

        $request->validate([
            'cant'=>'required',
            'producto'=>'required'
        ]);

        $cantidad = $request->cant;
        $codigo = $request->producto;
        $producto=[Product::where("id","=",$codigo)->first(),'cantidad'=>$cantidad];
        
        if (!$producto) {
            return redirect()
            ->route("Bill.create")
            ->with("mensaje","producto no encontrado");
        }

        $productos = $this->getproducts();
        $posibleindice = $this->buscarindicedeproducto($producto[0]->id,$productos);

        if ($posibleindice === -1) {
            array_push($productos,$producto);
        }
        else {
            $productos[$posibleindice]["cantidad"] = $productos[$posibleindice]["cantidad"] + $producto["cantidad"];
        }
        session(["productos"=>$productos,]);
        $this->updatetotal();
        return redirect("facturation/create");
    }

		private function buscarIndiceDeProducto($codigo, $productos) {
			foreach ($productos as $i => $producto) {
				if($producto[0]->id === $codigo) {
					return $i;
				}
			}
			return -1;
		}

    private function updatetotal() {
        $total = $this->gettotal();
				session(['total' => $total,]);
    }

    public function deleteProductToVent(Request $request){
        $indice=$request->indice;
        $productos= $this->getproducts();
        array_splice($productos,$indice,1);
        session(["productos"=>$productos,]);
        $this->updatetotal();

        return redirect("facturation/create");
    }

    public function cancelVent(){
        session(["total"=>null,]);
        session(["productos"=>null,]);
        
        return redirect("facturation/create");
    }

    public function view(){
				/* $productos = product::all();
				$cliente = Customer::all();
				$factura = Factura::all();
				$total = Factura_Detalle::all();
        return view('Bill.Report', compact('productos', 'cliente', 'factura', 'total')); */

				return view('Bill.Report');
    }
}


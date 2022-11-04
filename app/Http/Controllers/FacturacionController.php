<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class FacturacionController extends Controller
{
    public function gettotal(){
        $total=0;
        foreach ($this->getproducts() as $producto => $value) {
            $total +=$producto["cantidad"]*$producto[0]->precio_producto;
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
        $producto=[Producto::where("id","=",$codigo)->first(),'cantidad'=>$cantidad];
        
        if (!$producto) {
            return redirect()
            ->route("Bill.create")
            ->with("mensaje","producto no encontrado");
        }

        $productos = $this->getproducts();
        $posibleindice = $this->buscarindicedeproducto($producto[0]->id,$productos);

        if ($posibleindice===-1) {
            array_push($productos,$producto);
        }
        else {
            $productos[$posibleindice]["cantidad"] = $productos[$posibleindice]["cantidad"] + $producto["cantidad"];
        }
        session(["productos"=>$productos,]);
        $this->updatetotal();
        return redirect("facturacion/create");
    }
    private function updatetotal(){
        $total = $this->gettotal();
    }
    private function deleteproducttovent(Request $request){
        $indice=$request->indice;
        $productos= $this->getproducts();
        array_splice($productos,$indice,1);
        session(["productos"=>$productos,]);
        $this->updatetotal();

        return redirect("facturacion/create");
    }
    public function cancelarventa(){
        session(["total"=>null,]);
        session(["productos"=>null,]);
        
        return redirect("facturacion/create");
    }

    public function view(){
        return view('Bill.reports');
    }
}


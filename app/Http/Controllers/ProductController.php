<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Models\product;
use App\Models\Categorie;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = product::paginate(15);
        $categoria=Categorie::all();
        return view('products.Index',compact('producto', 'categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('products.Create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        try {
            $request->validated();
            $product = new product();
            $product ->nombre_producto = $request ->name;
            $product ->precio_producto = $request ->price;
            $product->fk_categories = $request -> categoria;
            $product->save();
            return redirect()->route('products.index')
            ->withadd('Se creo el producto correctamente');
        } catch (Exception $e) {
            return redirect()->route('products.index')
            ->witherrors('Ha ocurrido un error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        $categorias=Categorie::all();
        $categoria=Categorie::find($product->fk_categories);
        return view('products.Update',compact('product','categorias','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request,product $product)
    {
        try {
            $request->validated();
            $product ->nombre_producto = $request ->name;
            $product ->precio_producto = $request ->price;
            $product->fk_categories = $request -> categoria;
            $product->save();
            return redirect()->route('products.index')
            ->withadd('Se edito correctamente el producto');
        } catch (Exception $e) {
            return redirect()->back()
            ->witherrors('Ocurrio un error al editar el producto');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}

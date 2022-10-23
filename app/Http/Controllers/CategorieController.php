<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;
use Exception;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::paginate(15);
        return view('categories.Index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        try {
            $request->validated();
            $categoria = new Categorie();
            $categoria ->nombre_categoria = $request->name;
            $categoria->save();
            return redirect()->route('categorie.index')
            ->withAdd('Categoria Creada Exitosamente');
        } catch (Exception $e) {
            return redirect()->route('categorie.index')
            ->withErrors('Ha ocurrido un error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria= Categorie::find($id);
        return view('categories.Update',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, Categorie $categorie)
    {
        try {
            $request->validated();
            $categorie->nombre_categoria = $request->name;
            $categorie->save();

            return redirect()->route('categorie.index')
            ->withAdd('Categoria Actualizada Exitosamente');

        } catch (Exception $e) {
            
            return redirect()->route('categorie.index')
            ->withErrors('Ha ocurrido un error al editar la categoria');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect('/categorie');
    }
}

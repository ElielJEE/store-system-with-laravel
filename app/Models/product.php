<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function categorias(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function detalle_factura() {
        return $this->hasMany('App\Models\Factura_Detalle');
    }
}

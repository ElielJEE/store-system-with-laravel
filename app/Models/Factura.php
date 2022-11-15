<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    
    public function customers () {
        return $this->belongsTo('App\Models\Customer');
    }

    public function detalle_factura() {
        return $this->hasMany('App\Models\Factura_Detalle');
    }
}

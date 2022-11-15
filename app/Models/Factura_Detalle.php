<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura_Detalle extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function factura() {
        return $this->belongsTo('App\Models\Factura');
    }

    public function producto() {
        return $this->belongsTo('App\Models\product');
    }
}

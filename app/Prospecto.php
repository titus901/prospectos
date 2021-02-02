<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    //
    protected $table = "prospecto";
    protected $fillable = ['nombre', 'Apaterno', 'Amaterno', 'calle', 'numero', 'colonia', 'codigo', 'telefono', 'rfc', 'estatus_id', 'observaciones'];

    public function archivo()
    {
    	return $this->hasMany('App\ProspectoArchivo', 'prospecto_id', 'id');
    }
}

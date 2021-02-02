<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProspectoArchivo extends Model
{
    //
    protected $table = "prospecto_file";
    protected $fillable = ['prospecto_id', 'nombre', 'ruta_file', 'ruta'];
}

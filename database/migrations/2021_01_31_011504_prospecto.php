<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prospecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prospecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('Apaterno');
            $table->string('Amaterno');
            $table->string('calle');
            $table->string('numero');
            $table->string('colonia');
            $table->string('codigo');
            $table->string('telefono');
            $table->string('rfc');
            $table->integer('estatus_id');
            $table->string('observaciones');
            $table->timestamps();
        });
                    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('prospecto');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_computos', function (Blueprint $table) {
            $table->id();
            $table->engine="InnoDB";
            $table ->bigInteger('categoriaC_id')->unsigned();
            $table ->bigInteger('ubicacion_id')->unsigned();
            $table ->bigInteger('usuarios_id')->unsigned();
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serial');
            $table->string('detalles');
            $table->string('imagen');
            $table->timestamps();
            $table ->foreign('categoriaC_id')->references('id')->on('categoria_computos')->onDelete("cascade");
            $table ->foreign('ubicacion_id')->references('id')->on('ubicacions')->onDelete("cascade");
            $table ->foreign('usuarios_id')->references('id')->on('usuarios')->onDelete("cascade");
        
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_computos');
    }
};

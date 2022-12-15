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
          
           
            $table->string('marca');
            $table->string('modelo');
            $table->string('detalles');
            $table->string('imagen');
            $table->timestamps();
            $table ->bigInteger('categoriaC_id')->unsigned();
            
            $table ->foreign('categoriaC_id')->references('id')->on('categoria_computos')->onDelete("cascade");
       
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

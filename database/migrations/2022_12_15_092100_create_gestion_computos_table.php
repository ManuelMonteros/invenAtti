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
        Schema::create('gestion_computos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
                     
            $table ->bigInteger('ubicacion_id')->unsigned();
            $table ->bigInteger('usuarios_id')->unsigned();
            $table->string('serial');
            $table->string('observacion');
           
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
        Schema::dropIfExists('gestion_computos');
    }
};

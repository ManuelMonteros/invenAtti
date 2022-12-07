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
        Schema::create('equipo_telecos', function (Blueprint $table) {
            $table->id();
            $table->engine="InnoDB";
            $table ->bigInteger('categoriaT_id')->unsigned();
            $table->string('nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->string('detalles');
            $table->string('imagen');
            $table->timestamps();
            $table ->foreign('categoriaT_id')->references('id')->on('categoria_telecos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_telecos');
    }
};

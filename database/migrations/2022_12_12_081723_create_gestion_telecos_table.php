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
        Schema::create('gestion_telecos', function (Blueprint $table) {
            $table->id();
            $table->engine="InnoDB";
            $table ->bigInteger('equipo_id')->unsigned();
            $table->string('status');
            $table->date('actualizacion');
            $table->string('observacion');
            $table->string('serial')->unique();
            $table->string('ubicacion');
            $table->timestamps();
            $table ->foreign('equipo_id')->references('id')->on('equipo_telecos')->onDelete("cascade");
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestion_telecos');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cue');
            $table->string('nombre_cole');
            $table->string('localidad')->nullable();
            $table->string('inspeccion')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('ar')->nullable();
            $table->string('fp')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escuelas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSectionNuestraEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_section_nuestra_escuelas', function (Blueprint $table) {
            $table->increments('id')->comment('relaciona el post con la sec NE y le agrega el id la subcategoria');
            $table->integer('post_id')->unsigned(); //para que funcione va nombre_id
            $table->integer('sectio_nuestra_escuela_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('sectio_nuestra_escuela_id')->references('id')->on('section_nuestra_escuelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_section_nuestra_escuelas');
    }
}

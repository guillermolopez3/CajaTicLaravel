<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //a las tablas pivote hay que llamarlas con el nombre de las tablas relacionadas, en orden alfab, y snakecase
        Schema::create('post_section', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned(); //para que funcione va nombre_id
            $table->integer('section_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_section');
    }
}

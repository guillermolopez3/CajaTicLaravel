<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNesectionPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nesection_posts', function (Blueprint $table) {
            $table->increments('id')->comment('relaciona el post con la sec NE y le agrega el id la subcategoria');
            $table->integer('post_id')->unsigned(); //para que funcione va nombre_id
            $table->integer('nesection_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('nesection_id')->references('id')->on('nesections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nesection_posts');
    }
}

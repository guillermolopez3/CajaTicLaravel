<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_posts', function (Blueprint $table) {
            $table->increments('id')->comment('id_post con el nivel del rec');
            $table->integer('post_id')->unsigned(); //para que funcione va nombre_id
            $table->integer('level_id')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('level_id')->references('id')->on('levels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_posts');
    }
}

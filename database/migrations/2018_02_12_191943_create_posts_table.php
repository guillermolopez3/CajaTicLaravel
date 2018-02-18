<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title',255);
            $table->string('copete',255)->nullable();
            $table->text('image')->nullable();
            $table->string('tags',400)->nullable();
            $table->integer('id_tipo_activity')->unsigned();
            $table->text('description')->nullable();
            $table->text('link')->nullable();
            $table->boolean('activo');

            $table->foreign('id_tipo_activity')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

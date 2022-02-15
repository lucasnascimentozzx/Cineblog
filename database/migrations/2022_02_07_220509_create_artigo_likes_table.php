<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigo_likes', function (Blueprint $table) {
            $table->id();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');;
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('artigo_id')->references('id')->on('artigos');
            $table->unsignedBigInteger('artigo_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigo_likes');
    }
}

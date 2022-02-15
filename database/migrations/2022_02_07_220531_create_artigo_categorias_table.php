<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigoCategoriasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('artigo_categorias', function (Blueprint $table) {
            $table->id();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('categoria_id');

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
    public function down() {
        Schema::dropIfExists('artigo_categorias');
    }
}

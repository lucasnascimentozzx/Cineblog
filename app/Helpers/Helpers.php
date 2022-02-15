<?php

use App\Models\Categoria;

function categorias(){
    return Categoria::where('categoria_pai_id', null)->with('children')->get();
}
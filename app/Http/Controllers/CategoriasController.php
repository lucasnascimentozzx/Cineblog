<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        $categorias_nomes = $categorias->pluck('nome','id');
        $categorias->each(function($categoria) use($categorias_nomes){
            if($categoria->categoria_pai_id){
                $categoria->categoria_pai_nome = $categorias_nomes[$categoria->categoria_pai_id] ?? null;
            }
        });
        return view('admin.categorias')->with(['categorias' => $categorias]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'categoria_pai_id' => 'exists:categorias,id'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->fill($request->all());
        if($categoria->id == $categoria->categoria_pai_id){
            $categoria->categoria_pai_id = null;
        }
        $categoria->save();

        return redirect()->route('admin-categorias.index');
    }

    public function store(Request $request, Categoria $categoria){
        $request->validate([
            'nome' => 'required',
            'categoria_pai_id' => 'exists:categorias'
        ]);
        $categoria->fill($request->all());
        $categoria->save();
        return redirect()->route('admin-categorias.index');
    }

    public function show($id){
        return view('admin.categorias-show')->with(['categoria' => Categoria::findOrFail($id)]);
    }

    public function destroy($id){
        Categoria::findOrFail($id)->delete();
        return redirect()->back();
    }
}

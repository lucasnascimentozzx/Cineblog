<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Models\ArtigoCategoria;
use App\Models\ArtigoComentario;
use App\Models\ArtigoLike;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtigoController extends Controller {

    
    public function index() {
        $artigos = Artigo::withCount('likes')->orderBy('likes_count', 'desc')->get();

        $destaque = $artigos[0];

        unset($artigos[0]);

        return view('home')->with(['artigos' => $artigos, 'destaque' => $destaque]);
    }

    public function publicacoes(){
        return view('admin.publicacoes')->with(['publicacoes' => Artigo::all()]);
    }

    public function show($id) {
        $artigo = Artigo::withCount('likes')->findOrFail($id);
        $comentarios = $artigo->comentarios()->latest()->get();
        return view('view')->with(['artigo'=>$artigo, 'comentarios' => $comentarios]);
    }


    public function publicar(Request $request, Artigo $artigo) {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'texto' => 'required',
            'image' => 'required',
            'categorias' => 'array|required',
        ]);
        $artigo->fill($request->all());

        $artigo->foto = $request->file('image')->store('', 'imagens');

        $artigo->usuario_id = auth()->user()->id;

        $artigo->save();

        foreach ($request->categorias as $categoria) {
            try {
                ArtigoCategoria::create([
                    'artigo_id' => $artigo->id,
                    'categoria_id' => $categoria
                ]);
            } catch (\Throwable $th) {
                continue;
            }
        }

        return redirect()->route('view',['id' => $artigo->id]);
    }

    public function pesquisar(Request $request) {
        $query_string = $request->query('query');

        if (!$query_string) {
            return [];
        }

        $artigos = Artigo::select(['titulo', 'foto', 'id'])
            ->whereFullText('titulo', $query_string)
            ->OrWhereFullText('descricao', $query_string)
            ->limit(5)
            ->get();
        return $artigos;
    }

    public function categoria($categoria_nome) {

        $nome = Str::title(str_replace('-', ' ', $categoria_nome));

        $categoria  = Categoria::iLike('nome', "%$nome%")->first();

        if (!$categoria) {
            abort(404);
        }

        $artigos = Artigo::categoria($categoria->id)->get();
        return view('artigo-filtro')->with(['artigos' => $artigos, 'categoria' => $categoria->nome]);
    }

    public function destroy($id){
        Artigo::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function like($id){

        $artigo = Artigo::findOrFail($id);

        $artigo->like();

        return redirect()->back();
    }
    
    
    public function comentar(Request $request, $id){
        $request->validate([
            'comentario' => 'required'
        ]);

        $artigo = Artigo::findOrFail($id);

        ArtigoComentario::create([
            'artigo_id' => $artigo->id,
            'comentario' => $request->comentario,
            'usuario_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }

}

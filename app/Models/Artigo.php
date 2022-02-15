<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model {
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descricao',
        'texto',
        'foto'
    ];
    protected $appends = ['foto_url', 'link'];


    public function comentarios(){
        return $this->hasMany(ArtigoComentario::class, 'artigo_id', 'id')->with('usuario');
    }

    public function getFotoUrlAttribute() {
        return asset('img/' . $this->foto);
    }
    public function getLinkAttribute() {
        return route('view', ['id' => $this->id]);
    }

    public function scopeCategoria($query, $categoria_id) {
        return $query->join('artigo_categorias', 'artigo_categorias.artigo_id', 'artigos.id')
            ->where('categoria_id',  $categoria_id);
    }
    public function likes(){
        return $this->hasMany(ArtigoLike::class, 'artigo_id', 'id');
    }
    public function getUserLikedAttribute(){
        return ArtigoLike::where('artigo_id', $this->id)
                        ->where('usuario_id', auth()->user()->id)
                        ->exists();
    }
    public function like(){
        $like = ArtigoLike::where('usuario_id', auth()->user()->id)
                            ->where('artigo_id', $this->id)->first();
        if($like){
            $like->delete();
            return;
        }
        return ArtigoLike::create([
            'usuario_id' => auth()->user()->id,
            'artigo_id' => $this->id
        ]);

    }
}

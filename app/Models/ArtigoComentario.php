<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtigoComentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'artigo_id',
        'comentario',
        'usuario_id'
    ];
    public function usuario(){
        return $this->hasOne(Usuario::class, 'id', 'usuario_id');
    }
}

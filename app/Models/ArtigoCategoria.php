<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtigoCategoria extends Model {
    use HasFactory;
    protected $fillable = [
        'categoria_id',
        'artigo_id'
    ];
}

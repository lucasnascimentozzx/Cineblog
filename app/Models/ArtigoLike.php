<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtigoLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'artigo_id',
        'usuario_id'
    ];
}

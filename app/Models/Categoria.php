<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'categoria_pai_id'
    ];

    protected static function booted()
    {
        static::deleted(function ($categoria) {
            $categorias_filho = Categoria::where('categoria_pai_id', $categoria->id);
            $categorias_filho->update([
                'categoria_pai_id' => null
            ]);
        });
    }
    public function children(){
        return $this->hasMany(Categoria::class ,'categoria_pai_id');  
    }

    public function getLinkAttribute(){
        return route('categoria', ['name' => Str::slug($this->nome) ]);
    }

    public static function iLike($collumn, $value){
        return self::where(DB::raw("lower($collumn)"), 'like', strtolower($value));
    }
}

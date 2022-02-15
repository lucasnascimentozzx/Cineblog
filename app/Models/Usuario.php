<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'username',
    ];

    protected $hidden = [
        'password',
    ];

    protected $cast = [
        'admin' => 'boolean'
    ];


    protected static function booted(){
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
            $token = Str::random(80);
            while (!Usuario::where('api_token', $token)->get()) {
                $token = Str::random(80);
            }
            $user->api_token = $token;
        });
    }
    public function getAdminStringAttribute(){
        return $this->admin ? 'Sim' : 'Não';
    }
    public function getAuthIdentifierName() {
        return 'id';
    }

    public function getAuthIdentifier() {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken() {
        
    }

    public function setRememberToken($token) {
        
    }

    public function getRememberTokenName() {
        
    }

    public function scopeAdmin($query){
        return $query->where('admin', true);
    }
}

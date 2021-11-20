<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    protected $table = 'users';
    protected $fillable = [
        'usuario', 
        'password',
        'activo',
        'rol',
        'id_perfil'
    ];
    public $timestamps = false;
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }   
    public function contrato()
    {
        return $this->hasOne('App\models\Contrato');
    }
}

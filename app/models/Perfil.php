<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfil';
    protected $fillable = [
        'apellido',
        'nombre',
        'dni',
        'email',
        'telefono',
    ];
    public $timestamps = false;
    //
    public function usuario()
    {
        return $this->hasOne('App\models\Usuario');
    }
}

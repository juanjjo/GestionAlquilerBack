<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    protected $fillable = [
        'fecha', 
        'costoTotal',
        'idInquilino',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\models\Usuario');
    }

    public function locales()
    {
        return $this->hasMany(Local::class);return $this->hasMany(Local::class);
    }
    //
}

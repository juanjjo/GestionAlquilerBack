<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquiler';
    protected $fillable = [
        'fecha',
        'fechaDesde',
        'fechaHasta',
        'costoTotal',
        'id_inquilino'
    ];
    public $timestamps = false;

    // public function user()
    // {
    //     return $this->belongsTo('App\models\Usuario');
    // }

    // public function locales()
    // {
    //     return $this->hasMany(Local::class);return $this->hasMany(Local::class);
    // }
    //
}

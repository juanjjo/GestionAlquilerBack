<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'local';
    protected $fillable = [
        'piso',
        'numero',
        'estado',
        'ancho',
        'largo',
        'precio',
    ];

    public $timestamps = false;
    // public function contrato()
    // {
    //     return $this->belongsTo(Contrato::class);return $this->belongsTo(Contrato::class);
    // }
}

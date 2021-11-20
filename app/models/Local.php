<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'local';
    protected $fillable = [
        'superficie',
        'alquilado',
        'idContrato'
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);return $this->belongsTo(Contrato::class);
    }
}

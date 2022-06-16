<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamara extends Model
{
    protected $table = 'kamaras';
    protected $fillable =[
        'nombre',
        'idubicacion',
        'iddispositivo',
        'estado',
    ];

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class, 'idubicacion');
    }
    public function dispositivo(){
        return $this->belongsTo(Dispositivo::class, 'iddispositivo');
    }
}

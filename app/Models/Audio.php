<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';
    protected $fillable =[
        'nombre',
        'categoria',
        'url',
        'formato',
        'duracion',
        'estado',
    ];
}

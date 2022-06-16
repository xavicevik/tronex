<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Programa extends Model
{
    protected $table = 'programas';
    protected $fillable =[
        'idkamara',
        'estado',
        'idusuario',
        'idcreador',
        'pasos',
        'rutina' => 'array',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idusuario');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'idcreador');
    }

    public function kamara(){
        return $this->belongsTo(Kamara::class, 'idkamara');
    }
}

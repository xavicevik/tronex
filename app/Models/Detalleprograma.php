<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Detalleprograma extends Model
{
    protected $table = 'detalleprogramas';
    protected $fillable =[
        'idprograma',
        'consecutivo',
        'puerto',
        'accion',
        'duracion'
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idprograma');
    }

}

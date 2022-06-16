<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'dispositivos';
    protected $fillable =[
        'nombre',
        'modelo',
        'serial',
        'thingname',
        'estado',
        'disponibilidad',
        'GPIO01',
        'GPIO02',
        'GPIO03',
        'GPIO04',
        'GPIO05',
        'GPIO06',
        'GPIO07',
        'GPIO08',
        'GPIO09',
        'GPIO10',
        'GPIO11',
        'GPIO12',
        'GPIO13',
        'GPIO14',
        'GPIO15',
        'GPIO16',
        'GPIO17',
        'GPIO18',
        'GPIO19',
        'GPIO20',
        'GPIO21',
        'GPIO22',
        'GPIO23',
        'GPIO24',
        'GPIO25',
        'GPIO26',
        'GPIO27',
        'AUDIO1',
        'AUDIO2',
        'AUDIO3',
        'AUDIO4',
    ];
}

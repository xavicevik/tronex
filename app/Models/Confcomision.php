<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Confcomision extends Model
{
    protected $table = 'confcomisiones';
    protected $fillable =[
        'idmayorista',
        'iddistribuidor',
        'idvendedor',
        'comisionmayorista',
        'comisiondistribuidor',
        'comisionvendedor',
        'estado'
    ];

    public function vendedor()
    {
        return $this->belongsTo(Ubicacion::class, 'idvendedor')->where('idtipoempresa', 3);
    }

    public function distribuidor(){
        return $this->belongsTo(Ubicacion::class, 'iddistribuidor')->where('idtipoempresa', 2);
    }

    public function mayorista(){
        return $this->belongsTo(Ubicacion::class, 'idmayorista')->where('idtipoempresa', 1);
    }

    public function scopeUseIndex(Builder $query, string $index): Builder
    {
        $table = $this->getTable();

        return $query->from(DB::raw("`$table` USE INDEX(`$index`)"));
    }

    public function scopeForceIndex($query, string $index)
    {
        $table = $this->getTable();

        return $query->from(DB::raw("`$table` FORCE INDEX(`$index`)"));
    }
}

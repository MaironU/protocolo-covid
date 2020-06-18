<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'trabajador_id', 'sintoma_id',
    ];
    
    protected $primaryKey = 'reporteTrabajador_id';

    public function trabajador()
    {
        return $this->hasMany('App\Trabajador', 'trabajador_id');
    }

    public function sintoma()
    {
        return $this->hasMany('App\Sintoma', 'sintoma_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $fillable = [
        'email', 'password',
    ];
    protected $primaryKey = 'trabajador_id';

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function reporte()
    {
        return $this->belongsTo('App\Reporte');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{

    protected $fillable = [
        'name',
    ];
    protected $primaryKey = 'sintoma_id';

    public function reporte()
    {
        return $this->belongsTo('App\Reporte');
    }
}

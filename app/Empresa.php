<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function trabajador()
    {
        return $this->hasMany('App\Trabajador');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}

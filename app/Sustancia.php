<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sustancia extends Model
{
    //
    protected $fillable = ['nombre', 'vidaMedia'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}

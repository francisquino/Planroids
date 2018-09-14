<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = ['nombre'];

    public function sustancias()
    {
        return $this->belongsToMany('App\Sustancia');
    }
}

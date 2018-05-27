<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function marca() {
        return $this->belongsTo('App\Marca');
    }

    protected $fillable = array('nome');
}

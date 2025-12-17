<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $guarded = [];

    public function item () 
    {
        $this->hasMany('App\Models\item');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loan extends Model
{
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo('App\Models\user');
    }
}

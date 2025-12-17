<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class item extends Model
{
    protected $guarded = [];

    public function category()
    {
        $this->belongsTo('App\Models\item');
    }

    public function loan()
    {
        $this->belongsToMany('App\Models\loan');
    }
}

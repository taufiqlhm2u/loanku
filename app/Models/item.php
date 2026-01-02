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
        return $this->belongsTo('App\Models\category');
    }

    public function item_loan()
    {
        return $this->hasMany('App\Models\item_loan');
    }
}

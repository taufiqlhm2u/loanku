<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class item extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
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

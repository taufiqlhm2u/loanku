<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item_loan extends Model
{
    protected $table = 'item_loan';

    public function item()
    {
        return $this->belongsTo('App\Models\item');
    }

    public function loan ()
    {
        return $this->belongsTo('App\Models\loan');
    }
}

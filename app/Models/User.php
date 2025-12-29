<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
   
   use SoftDeletes; 
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function loan() 
    {
        return $this->hasMany('App\Models\loan');
    }
}

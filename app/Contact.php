<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'description'
    ];

    public function turn()
    {
        return $this->hasMany('App\Turn');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = [
        'id', 'contact_id', 'start', 'end', 'comments', 'review', 'finished'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
}

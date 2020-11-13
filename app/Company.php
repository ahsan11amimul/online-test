<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

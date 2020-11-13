<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded=[];
    public function companies()
    {
        return $this->hasMany('App\Company');
    }
}

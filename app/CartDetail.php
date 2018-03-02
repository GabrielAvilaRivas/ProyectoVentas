<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    //cart detail N    1Package
    public function package()
    {
    	return $this->belongsTo(Package::class);
    }
}

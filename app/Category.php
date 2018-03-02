<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$category->packages
     public function packages()
    {
    	return $this->hasMany(Package::class);
    }
}

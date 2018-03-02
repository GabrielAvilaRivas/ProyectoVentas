<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageImage extends Model
{
    //$packageimage->package
    public function package()
    {
    	return $this->belongsTo(Package::class);
    }

    public function getUrlAttribute()
    {
    	if (substr($this->image, 0, 4) === "http"){
    		return $this->image;
    	}

    	return '/images/packages/' . $this->image;
    }

}

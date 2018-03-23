<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'descripcion'];

    //$category->packages
     public function packages()
    {
    	return $this->hasMany(Package::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        if ($this->image)
            return '/images/categories/'.$this->image;
        //else
    	$firstPackage = $this->packages()->first();
        if ($firstPackage)
    	   return $firstPackage->featured_image_url;

        return '/image/default.jpg';
    }
}

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
    	$featuredPackage = $this->packages()->first();
    	return $featuredPackage->featured_image_url;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //$product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    //$package->images
    public function images()
    {
    	return $this->hasMany(PackageImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage) 
            $featuredImage = $this->images()->first();
        if ($featuredImage) {
            return $featuredImage->url;
        }

        //defecto
        return '/images/default.jpg';
    }


    public function getCategoryNameAttribute()
    {
        if($this->category)
            return $this->category->name;

        return 'General';
    }
}

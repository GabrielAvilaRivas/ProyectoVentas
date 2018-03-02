<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class PackageController extends Controller
{
    public function show($id)
    {
    	$package = Package::find($id);
    	$images = $package->images;

    	$imagesLeft = collect();
    	$imagesRight = collect();
    	foreach ($images as $key => $image) {
    		if ($key%2==0)
    			$imagesLeft->push($image);
    		else
    			$imagesRight->push($image);
    	}

    	return view('packages.show')->with(compact('package', 'imagesLeft', 'imagesRight'));
    }
}

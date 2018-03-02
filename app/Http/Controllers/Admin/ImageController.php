<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Package;
use App\PackageImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
    	$package = Package::find($id);
    	$images = $package->images()->orderBy('featured','desc')->get();
    	return view('admin.packages.images.index')->with(compact('package', 'images'));
    }

    public function store(Request $request, $id)
    {
    	//guardar img del paquete
    	$file = $request->file('photo');
    	$path = public_path() . '/images/packages';
    	$filename = uniqid() . $file->getClientOriginalName();
    	$moved = $file->move($path, $filename);

    	//crear 1 registro en la tabla package_images
    	if ($moved) {
    		$packageImage = new PackageImage();
	    	$packageImage->image=$filename;
	    	//$packageImage->featured=false;
	    	$packageImage->package_id = $id;
	    	$packageImage->save(); //Insert
    	}    	

    	return back();
    }

    public function destroy(Request $request, $id)
    {
    	//eliminar el archivo
    	$packageImage = PackageImage::find($request->input('image_id'));
    	if (substr($packageImage->image, 0, 4) == "http") {
    		$deleted = true;
    	}else{
    		$fullPath = public_path() . '/images/packages/' . $packageImage->image;
    		$deleted = File::delete($fullPath);
    	}    	

    	//eliminar el registro de la BD
    	if ($deleted) {
    		$packageImage->delete();
    	}

    	return back();
    }

    public function select($id, $image)
    {
        PackageImage::where('package_id', $id)->update([
            'featured' => false
        ]);

        $packageImage = PackageImage::find($image);
        $packageImage->featured = true;
        $packageImage->save();

        return back();
    }
}

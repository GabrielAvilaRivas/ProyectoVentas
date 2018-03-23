<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;

class SearchController extends Controller
{
    public function show(Request $request)
    {
    	$query = $request->input('query');
    	$packages = Package::where('name','like', "%$query%")->paginate(5);
    	if($packages->count() == 1){
    		$id = $packages->first()->id;
    		return redirect("packages/$id"); 
    	}
    	return view('search.show')->with(compact('packages', 'query'));
    }

    public function data()
    {
    	$packages = Package::pluck('name');
    	return $packages;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Category;

class TestController extends Controller
{
	public function welcome()
	{
		$categories= Category::has('packages')->get();
    	return view('welcome')->with(compact('categories'));
	}
}

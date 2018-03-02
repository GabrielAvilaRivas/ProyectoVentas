<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;

class TestController extends Controller
{
	public function welcome()
	{
		$packages= Package::paginate(9);
    	return view('welcome')->with(compact('packages'));
	}
}

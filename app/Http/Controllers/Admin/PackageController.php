<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Package;

class PackageController extends Controller
{
    public function index()
    {
    	$packages = Package::paginate(10);
    	return view('admin.packages.index')->with(compact('packages')); 	//listado
    }

      public function create()
    {
		return view('admin.packages.create');	//formulario de registro
    }

      public function store(Request $request)
    {
    	//validar
    	$messages = [
    		'name.required' => 'El nombre es necesario',
    		'name.min' => 'El nombre debe tener minimo 4 caracteres',
    		'description.required' => 'La descripcion es Obligatoria',
    		'description.max' => 'La descripcion no puede sobrepasar los 200 caracteres',
    		'price.required' => 'El precio es obligatorio',
    		'price.min' => 'No se admiten valores negativos',
    		'price.numeric' => 'Ingrese un precio valido'
    	];
    	$rules = [
    		'name' => 'required | min:4',
    		'description' => 'required | max:200',
    		'price' => 'required |numeric|min:0 ',

    	];
    	$this->validate($request, $rules,$messages);

    	//registrar el nuevo Producto en la Bd
    	//dd($request->all());
    	$package = new Package();
    	$package->name = $request->input('name');
    	$package->description = $request->input('description');
    	$package->price = $request->input('price');
    	$package->long_description = $request->input('long_description');
    	$package->save();//insert into 

    	return redirect('/admin/packages');
    }


      public function edit($id)
    {
    	//return "Mostras Aui el id $id";
    	$package = Package::find($id);
		return view('admin.packages.edit')->with(compact('package'));	//formulario de registro
    }

      public function update(Request $request, $id)
    {
    	//validar
    	$messages = [
    		'name.required' => 'El nombre es necesario',
    		'name.min' => 'El nombre debe tener minimo 4 caracteres',
    		'description.required' => 'La descripcion es Obligatoria',
    		'description.max' => 'La descripcion no puede sobrepasar los 200 caracteres',
    		'price.required' => 'El precio es obligatorio',
    		'price.min' => 'No se admiten valores negativos',
    		'price.numeric' => 'Ingrese un precio valido'
    	];
    	$rules = [
    		'name' => 'required | min:4',
    		'description' => 'required | max:200',
    		'price' => 'required |numeric|min:0 ',

    	];
    	$this->validate($request, $rules,$messages);
    	//registrar el nuevo Producto en la Bd
    	//dd($request->all());
    	$package = Package::find($id);
    	$package->name = $request->input('name');
    	$package->description = $request->input('description');
    	$package->price = $request->input('price');
    	$package->long_description = $request->input('long_description');
    	$package->save();//Update into 

    	return redirect('/admin/packages');
    }

      public function destroy($id)
    {
    	//registrar el nuevo Producto en la Bd
    	//dd($request->all());
    	$package = Package::find($id);
    	$package->delete(); //Delete  

    	return back();
    }
}

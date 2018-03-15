<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
  	public function index()
    {
    	$categories = Category::orderBy('id')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); 	//listado
    }

      public function create()
    {
		return view('admin.categories.create');	//formulario de registro
    }

    public function store(Request $request)
   	{
    	//validar
    	$messages = [
    		'name.required' => 'Es Necesario Ingresar un Nombre Para la Categoría',
    		'name.min' => 'El nombre de la Categoría debe tener minimo 4 caracteres',
    		'descripcion.max' => 'La descripcion no puede sobrepasar los 250 caracteres'
    	];
    	$rules = [
    		'name' => 'required | min:4',
    		'descripcion' => 'max:250'

    	];
    	$this->validate($request, $rules,$messages);

    	//registrar en la Bd
    	//dd($request->all());
    	Category::create($request->all()); // mass assignment

    	return redirect('/admin/categories');
    }


      public function edit($id)
    {
    	//return "Mostras Aui el id $id";
    	$category = Category::find($id);
		return view('admin.categories.edit')->with(compact('category'));	//formulario de registro
    }

      public function update(Request $request, Category $category)
    {
    	//validar
    	$messages = [
            'name.required' => 'Es Necesario Ingresar un Nombre Para la Categoría',
            'name.min' => 'El nombre de la Categoría debe tener minimo 4 caracteres',
            'descripcion.max' => 'La descripcion no puede sobrepasar los 250 caracteres'
        ];
        $rules = [
            'name' => 'required | min:4',
            'descripcion' => 'max:250'

        ];
    	$this->validate($request, $rules,$messages);
    	//registrar el nuevo Producto en la Bd
    	//dd($request->all());
    	$category->update($request->all());

    	return redirect('/admin/categories');
    }

      public function destroy(Category $category)
    {
    	//registrar el nuevo Producto en la Bd
    	//dd($request->all());
    	$category->delete(); //Delete  

    	return back();
    }
}

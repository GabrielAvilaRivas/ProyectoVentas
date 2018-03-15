@extends('layouts.app')

@section('title', 'Bienvenido a Kato Films')

@section('body-class','package-page')

@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">Editar Paquete Seleccionado</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ url('/admin/packages/'.$package->id.'/edit') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre del Paquete</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $package->name) }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Precio del Paquete</label>
                                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $package->price) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripcion Corta</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description', $package->description) }}">
                            </div>
                        </div>

                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Categoría del Producto</label>
                                    <select class="form-control" name="category_id">
                                        <option value="0">General</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id ==old('category_id', $package->category_id)) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div> 

                    <textarea class="form-control" placeholder="Descripciòn Extensa del Producto" rows="5" name="long_description">{{ old('long_description') }}</textarea>

                    <button class="btn btn-info">Guardar Cambios</button>
                    <a href="{{ url('/admin/packages') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>

        </div>

    </div>

@include('includes.footer')
@endsection

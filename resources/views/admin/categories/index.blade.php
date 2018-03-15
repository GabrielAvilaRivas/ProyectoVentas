
@extends('layouts.app')

@section('title', 'Listado de Categorías')

@section('body-class','package-page')

@section('content')
    <div class="header header-filter" style="background-image: url('img/fondo1.jpg');">
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Listado de Categorías</h2>
                <div class="team">
                    <div class="row">
                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">
                        <i class="material-icons">call_made</i> Nueva Categoría
                    </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-2 text-center">Nombre</th>
                                    <th class="col-md-5 text-center">Descripciòn</th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->descripcion }}</td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="button" rel="tooltip" title="Ver Categoría" class="btn btn-info btn-simple btn-xs">
                                        <i class="material-icons">visibility</i>
                                    </button>
                                    <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar Categoría" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                       <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                        </button> 
                                    </form>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $categories->links() }}
                    </div>
                </div>

            </div>
        </div>

    </div>

@include('includes.footer')
@endsection

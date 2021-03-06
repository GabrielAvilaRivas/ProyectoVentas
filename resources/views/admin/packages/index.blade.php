
@extends('layouts.app')

@section('title', 'Listado de Paquetes')

@section('body-class','package-page')

@section('content')
    <div class="header header-filter" style="background-image: url('img/fondo1.jpg');">
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center">
                <h2 class="title">Listado de Paquetes</h2>
                <div class="team">
                    <div class="row">
                    <a href="{{ url('/admin/packages/create') }}" class="btn btn-primary btn-round">
                        <i class="material-icons">call_made</i> Agregar Paquete
                    </a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-2 text-center">Nombre</th>
                                    <th class="col-md-5 text-center">Descripciòn</th>
                                    <th class="text-center">Categorìa</th>
                                    <th class="text-right">Precio</th>
                                    <th class="text-right">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($packages as $package)
                            <tr>
                                <td class="text-center">{{ $package->id }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->category_name }}</td>
                                <td class="text-right">S/. {{ $package->price }}</td>
                                <td class="td-actions text-right">
                                    
                                    <form method="post" action="{{ url('/admin/packages/'.$package->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a href="{{ url('/packages/'.$package->id) }}" rel="tooltip" title="Ver Paquetes" class="btn btn-info btn-simple btn-xs" target="_blank">
                                        <i class="material-icons">visibility</i>
                                        </a>
                                    <a href="{{ url('/admin/packages/'.$package->id.'/edit') }}" rel="tooltip" title="Editar Paquete" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/admin/packages/'.$package->id.'/images') }}" rel="tooltip" title="Imagenes del Paquete" class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
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

                        {{ $packages->links() }}
                    </div>
                </div>

            </div>
        </div>

    </div>

@include('includes.footer')
@endsection

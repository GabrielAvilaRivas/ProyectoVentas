@extends('layouts.app')

@section('title', 'Bienvenido a Kato Films | Dashboard')

@section('body-class','package-page')

@section('content')
    <div class="header header-filter" style="background-image: url('img/fondo1.jpg');">
    </div>

    <div class="main main-raised">
        <div class="container">

            <div class="section">
                <h2 class="title text-center">Inicio</h2>

                @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                @endif

                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="active">
                        <a href="#dashboard" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito Compras
                        </a>
                    </li>
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos Realizados
                        </a>
                    </li>
                </ul>

                <hr>
                <p>Hay {{ auth()->user()->cart->details->count() }} pedido</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Nombre</th>
                            <th>Precio</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->cart->details as $detail)
                    <tr>
                        <td class="text-center">
                            <img src="{{ $detail->package->featured_image_url }}" height="100">
                        </td>
                        <td>
                            <a href="{{ url('/packages/'.$detail->package->id) }}">{{ $detail->package->name }}</a>
                        </td>
                        <td>S/. {{ $detail->package->price }}</td>
                        <td class="td-actions">
                            
                            <form method="post" action="{{ url('/cart') }}" >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">

                                <a href="{{ url('/packages/'.$detail->package->id) }}" target="_blank" rel="tooltip" title="Ver Paquete" class="btn btn-info btn-simple btn-xs">
                                    <i class="material-icons">visibility</i>
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

                <div class="text-center">
                    <form method="post" action="{{ url( '/order' ) }}">
                        {{ csrf_field() }}

                        <button class="btn btn-primary btn-round">
                            <i class="material-icons">done</i> Realizar Pedido del Paquete
                        </button>                        
                    </form>
                </div>

            </div>

        </div>
    </div>
@include('includes.footer')
@endsection

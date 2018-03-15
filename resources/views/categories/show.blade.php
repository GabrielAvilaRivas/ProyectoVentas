@extends('layouts.app')

@section('title', 'Bienvenido a Kato Films | Dashboard')

@section('body-class','profile-page')

@section('styles')
    <style>
        .team{
            padding-bottom: 50px;
        }
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
    </style>
@endsection

@section('content')     
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $category->featured_image_url }}" alt=" Imagen Representativa de la Categoría {{ $category->name }}" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">{{ $category->name }}</h3>
                    </div>
                    
                     @if (session('notification'))
                         <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif

                </div>
            </div>
            <div class="description text-center">
                <p>{{ $category->descripcion }}</p>
            </div>
               
             <div class="team text-center">
                    <div class="row">
                        @foreach ($packages as $package)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ $package->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle" width="170" height="250">
                                <h4 class="title">
                                    <a href="{{ url('/packages/'.$package->id) }}">{{ $package->name }}</a>
                                </h4>
                                <p class="description">{{ $package->description }}</p>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ $packages->links() }}
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Modal Core -->
                <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                         <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h4 class="modal-title" id="myModalLabel">Paquete Seleccionado</h4>
                        </div>
                        <form method="post" action="{{ url('/cart') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="package_id" value="{{$package->id}}">
                            <div class="modal-body">
                            <div align="center">
                            <p>¿Desea Adquirir el Paquete {{ $package->name }}?</p>
                            <img src="{{ $package->featured_image_url }}" alt="Circle Image" class="img-circle img-responsive img-raised" width="250" height="250">
                             </div>                        
                             </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar   </button>
                            <button type="submit" class="btn btn-info btn-simple">Selecionar Paquete</button>
                      </div>
                        </form>
                    </div>
                  </div>
                </div>

@include('includes.footer')
@endsection

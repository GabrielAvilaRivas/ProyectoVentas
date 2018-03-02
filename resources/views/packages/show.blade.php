@extends('layouts.app')

@section('title', 'Bienvenido a Kato Films | Dashboard')

@section('body-class','profile-page')

@section('content')     
<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $package->featured_image_url }}" alt="Circle Image" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">{{ $package->name }}</h3>
                        <h6>{{ $package->category->name }}</h6>
                    </div>
                    
                     @if (session('notification'))
                         <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif

                </div>
            </div>
            <div class="description text-center">
                <p>{{ $package->long_description }}</p>
            </div>

            <div class="text-center">
                <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                    <i class="material-icons">add</i> Adquirir Paquete
                </button>
            </div>

                

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">

                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach($imagesLeft as $image)
                                            <img src="{{ $image->url }}" class="img-rounded" />
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach($imagesRight as $image)
                                            <img src="{{ $image->url }}" class="img-rounded" />
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Profile Tabs -->
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

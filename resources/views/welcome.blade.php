@extends('layouts.app')

@section('title', 'Bienvenido a Kato Films')

@section('body-class','landing-page')

@section('styles')
    <style>
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

        .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="header header-filter" style="background-image: url('img/fondo1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title">Bienvenido a Kato Films</h1>
                    <h4>Contactanos En Linea y Nosotros te Contactaremos Para Acordar Lo Necesario Para Atenderte.</h4>
                    <br />
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> ¿Como Usar El sitio?
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">¿Por que Elegir Kato Films?</h2>
                        <h5 class="description">Por Que Somos Una Empresa Seria Dedicada Al Trabajo De Filmaciones Para Satisfacerlo Brindando Un Servicio De Calidad y Acorde Asus Necesidades.</h5>
                    </div>
                </div>

                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Atendemos tus Dudas</h4>
                                <p>Atendemos tus inquietudes de la mejor manera posible intentado siempre dejarte conforme sobre tus preguntas contactandote por chat o telefeno celular.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Seguridad</h4>
                                <p>Te ofrecemos un servicio seguro y de calidad sin cancelaciones de ultimo momento con total confianza.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Informacion Privada</h4>
                                <p>La informacion q nos brindes por el sitio sera totalmente privada a traves del panel de usuario. Nadie mas tendra acceso.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section text-center">
                <h2 class="title">Mira Nuestras Categorias</h2>

                <form class="form-inline" method="get" action="{{ url('/search') }}">
                    <input type="text" placeholder="¿Que Desea Buscar" class="form-control" name="query" id="search">
                    <button class="btn btn-primary btn-just-icon" type="submit">
                        <i class="material-icons">search</i>
                    </button>
                </form>

                <div class="team">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ $category->featured_image_url }}" alt="Imagen Representativa de la Categoria {{ $category->name }}" class="img-raised img-circle" width="170" height="250">
                                <h4 class="title">
                                    <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                                </h4>
                                <p class="description">{{ $category->description }}</p>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="section landing-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">¿Aun No estas Registrado?</h2>
                        <h4 class="text-center description">Registrate ingresando tus datos basicos y podras realizar pedidos del servicio que desees. Si a un no te decides de todas formas con tu cuenta de usuario podràs hacer todas tus consultas sin compromiso.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre</label>
                                        <input type="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Correo Electronico</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Comenzar Registro
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function() {
            //
            var packages = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: '{{ url("/packages/json") }}'
            });
           //inicializar typehead sobre el input de búsqueda
           $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
           }, {
                name: 'packages',
                source: packages
           });
        });
    </script>
@endsection
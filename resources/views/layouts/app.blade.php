<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.bootgrid.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/Utils.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery.bootgrid.min.js')}}" type="text/javascript"></script>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Entidades<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('entity.index') }}" >Entidades</a></li>
                                    <li><a href="{{ route('entitycategory.index') }}">Categorias</a></li>
                                    <li><a href="{{ route('country.index') }}">Paises</a></li>
                                    <li><a href="{{ route('state.index') }}">Estados</a></li>
                                    <li><a href="{{ route('city.index') }}">Cidades</a></li>
                                    <li><a href="{{ route('postalcode.index') }}">CEPs</a></li>
                                    <li><a href="{{ route('neighborhood.index') }}">Bairros</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Produtos<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('product.index') }}" >Produtos</a></li>
                                    <li><a href="{{ route('brand.index') }}">Marcas</a></li>
                                    <li><a href="{{ route('productgroup.index') }}">Grupos</a></li>
                                    <li><a href="{{ route('productsubgroup.index') }}">SubGrupos</a></li>
                                    <li><a href="{{ route('productcategory.index') }}">Categorias</a></li>
                                    <li><a href="{{ route('munitsystem.index') }}">Unidades</a></li>
                                    <li><a href="{{ route('unitmultiplier.index') }}">Multiplicadores</a></li>
                                    <li><a href="{{ route('productattribute.index') }}">Atributos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

</body>
</html>

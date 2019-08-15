<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Consolide') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js?v=1') }}" defer></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}" defer></script>
        <script src="{{ asset('js/ajax-setup.js') }}" defer></script>
        <script src="{{ asset('js/global-masks.js?v=1') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <input type="hidden" value="{{asset('')}}" id="asset"/>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('image/logo.png')}}" style="height: 45px" border="0"/> </a>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container-fluid">
                    <div id="error-tag">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            Foram encontrados alguns problemas no formulário:<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>

                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    @yield('extra-contents')
                </div>
            </main>
        </div>
    </body>
</html>
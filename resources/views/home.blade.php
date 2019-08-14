@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Projeto consolide
            </div>

            <div class="links">
                <a href="{{ url('/marcas') }}">Cadastrar marcas</a>
            </div>
        </div>
    </div>
@endsection

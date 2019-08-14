@extends('layouts.app')
@section('content')
<div class="card-header">
    Criar marca
</div>
<div class="card-body">
    {!! Form::open(array('route' => 'marcas.store','method'=>'POST')) !!}
         @include('marcas._form')
    {!! Form::close() !!}
</div>
@endsection
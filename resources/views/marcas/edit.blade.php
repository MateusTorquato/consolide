@extends('layouts.app')
@section('content')
<div class="card-header">
    Editar marcas
</div>
<div class="card-body">
    {!! Form::model($marca, array('route' => ['marcas.update', $marca->id],'method'=>'put')) !!}
         @include('marcas._form')
    {!! Form::close() !!}
</div>
@endsection
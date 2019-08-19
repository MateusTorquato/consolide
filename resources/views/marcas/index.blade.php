@extends('layouts.app')
@section('content')
<div class="card-header"><i class="fa fa-group"></i> Marcas</div>
<div class="card-body">
    {!! Form::open(['method'=>'GET','url'=>'marcas'])  !!}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group required">
                <label>Código</label>
                {!! Form::text('codigo_identificacao', $request->codigo_identificacao, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Nome</label>
                {!! Form::text('nome', $request->nome, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-search"></i> Buscar
            </button>
            <a class="btn btn-success" href="{{ route('marcas.create') }}">
                <i class="fa fa-plus"></i> Nova marca
            </a>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="table-responsive">
        <table class="table table-bordered" style="margin-top: 20px;">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Data registro</th>
                <th width="280px">Ações</th>
            </tr>
            @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->codigo_identificacao}}</td>
                    <td>{{ $marca->nome}}</td>
                    <td>{{ $marca->cpf}}</td>
                    <td>{{ $marca->telefone}}</td>
                    <td>{{ $marca->email}}</td>
                    <td>{{ formataData($marca->data_registro)}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('marcas.edit',$marca->id) }}">Editar</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['marcas.destroy', $marca->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {!! $marcas->links() !!}
</div>
@endsection
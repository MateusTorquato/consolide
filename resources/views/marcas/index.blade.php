@extends('layouts.app')
@section('content')
<div class="card-header"><i class="fa fa-group"></i> Marcas</div>
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('marcas.create') }}">
                    <i class="fa fa-plus"></i> Nova marca
                </a>
            </div>
        </div>
    </div>

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

    {!! $marcas->links() !!}
</div>
@endsection
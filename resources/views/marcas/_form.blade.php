<fieldset>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group required">
                <label>Código</label>
                {!! Form::text('codigo_identificacao', $marca->codigo_identificacao, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Nome</label>
                {!! Form::text('nome', $marca->nome, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>CPF</label>
                {!! Form::text('cpf', $marca->cpf, ['class' => 'form-control cpf', 'required']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Telefone</label>
                {!! Form::text('telefone', $marca->telefone, ['class' => 'form-control telefone']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group required">
                <label>Email</label>
                {!! Form::text('email', $marca->email, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Endereço</label>
                {!! Form::text('endereco', $marca->endereco, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Data do registro</label>
                {!! Form::date('data_registro', $marca->data_registro, ['class' => 'form-control date', 'required']) !!}
            </div>
        </div>
    </div>
</fieldset>

<div class="row">
    <div class="col-md-12 ">
            <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>

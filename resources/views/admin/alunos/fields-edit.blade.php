<div>
    <strong class="ml-1 ml-2">
        <span class="fa fa-file-alt mr-2 mb-3"></span> Dados Pessoais
    </strong>
<div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('nome', null, ['placeholder'=>'Nome', 'class' => 'form-control', 'maxlength' => '100']) !!}
    </div>
    <div class="col">
        {!! Form::text('email', null, ['placeholder'=>'E-mail', 'class' => 'form-control', 'maxlength' => '100']) !!}
    </div>
</div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('telefone', null, ['placeholder'=>'Telefone', 'class' => 'form-control telefone', 'maxlength' => '20']) !!}
    </div>
    <div class="col">
        {!! Form::text('celular', null, ['placeholder'=>'Celular', 'class' => 'form-control celular', 'maxlength' => '20']) !!}
    </div>
</div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('rg', null, ['placeholder'=>'RG', 'class' => 'form-control', 'maxlength' => '20']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('cpf', null, ['placeholder'=>'CPF', 'class' => 'form-control cpf', 'maxlength' => '20']) !!}
    </div>
    <div class="col">
        @isset($registro)
            <select name="turmas[]" class="turmas" multiple>
                @foreach($turmaOptions as $key => $option)
                    @if( $turmas->contains($key) )
                        <option value="{{ $key }}" selected> {{ $option }} </option>
                    @else
                        <option value="{{ $key }}"> {{ $option }}</option>
                    @endif
                @endforeach
            </select>
        @else
            <select name="turmas[]" class="form-control turmas" multiple>
                <option value="" disabled>Turmas</option>
                @foreach($turmaOptions as $key => $option)
                    <option value="{{ $key }}"> {{ $option }} </option>
                @endforeach
            </select>
        @endisset        
    </div>
    <div class="col-md-2">
        {!! Form::select('situacao_id', $situacaoOptions, null, ['class' => 'form-control', 'placeholder' => 'Situa????o']) !!}        
    </div>
</div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('observacao', null, ['placeholder'=>'Observa????o', 'class' => 'form-control', 'maxlength' => '200']) !!}
    </div>
</div>

<hr />

<div>
    <strong class="ml-1 ml-2">
        <span class="fa fa-map-marker-alt mr-2 mb-3"></span> Endere??o
    </strong>
<div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('rua', null, ['placeholder'=>'Rua', 'class' => 'form-control', 'maxlength' => '100']) !!}
    </div>
    <div class="col-2">
        {!! Form::text('numero', null, ['placeholder'=>'N??mero', 'class' => 'form-control', 'maxlength' => '10']) !!}
    </div>
    <div class="col">
        {!! Form::text('complemento', null, ['placeholder'=>'Complemento', 'class' => 'form-control', 'maxlength' => '200']) !!}
    </div>
</div>
<div class='form-group row'>
<div class="col">
        {!! Form::text('bairro', null, ['placeholder'=>'Bairro', 'class' => 'form-control', 'maxlength' => '100']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::select('cidade_id', $cidadeOptions, null, ['class' => 'form-control', 'placeholder' => 'Cidade']) !!}        
    </div>
    <div class="col-md-2">
        {!! Form::text('estado', 'Paran??', ['placeholder'=>'Estado', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
    </div>
</div>

<hr />

<div>
    <strong class="ml-1 ml-2">
        <span class="fa fa-ticket-alt mr-2 mb-3"></span> Acesso
    </strong>
<div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('codigo_acesso', null, ['placeholder'=>'C??digo de Acesso', 'class' => 'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::select('dia_pagamento', $diaPagamentoOptions, null, ['class' => 'form-control', 'placeholder' => 'Dia do Pagamento']) !!}        
    </div>
    <div class="col">
        {!! Form::text('data_matricula', Helper::formataDataOut( $registro->data_matricula ), ['placeholder'=>'Data da Matr??cula', 'class' => 'form-control col-md-11 data', 'autocomplete' => 'off', 'style' => 'display: inline-block;']) !!}
        <td class="titulo_show">  
            <i class="fas fa-question turma-hint" 
                title="Usada no c??lculo de Inadimplentes!"></i>
        </td>
    </div>
</div>

<div class="form-group">
    @isset($registro)
        {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
    @else
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary float-right']) !!}
    @endisset
</div>

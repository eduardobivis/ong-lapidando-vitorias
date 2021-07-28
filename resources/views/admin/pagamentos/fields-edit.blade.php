<!-- Hidden Input com ID do Aluno -->
<input name="aluno_id" type="hidden" value="{{ $registro->aluno_id }}" />

<div class='form-group row'>
    <div class="col">
        <input style="display: inline-block" type="text" class="form-control" value="Aluno: {{ $registro->aluno->nome }}" readonly>
    </div>
    <div class="col">
        {!! Form::text('data', Helper::formataDataOut( $registro->data ), ['placeholder'=>'Data', 'class' => 'form-control data', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('observacao', null, ['placeholder'=>'Observação', 'class' => 'form-control', 'maxlength' => '200']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
</div>

<!-- Hidden Input com ID do Aluno -->
<input name="aluno_id" type="hidden" value="{{ $registro->id }}" />


<div class='form-group row'>
    <div class="col">
        <input style="display: inline-block" type="text" class="form-control" value="Aluno: {{ $registro->nome }}" readonly>
    </div>
    <div class="col">
        {!! Form::text('data', Helper::getDataAtual(), ['placeholder'=>'Data', 'class' => 'form-control data', 'autocomplete' => 'off']) !!}
    </div>
    <div class="col">
        {!! Form::text('horario', Helper::getHorarioAtual(), ['placeholder'=>'Horário', 'class' => 'form-control horario', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class='form-group row'>
    <div class="col">
        {!! Form::text('justificativa', null, ['placeholder'=>'Justificativa', 'class' => 'form-control', 'maxlength' => '200']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary float-right']) !!}
</div>

<div class='form-group row' style="display:flex; align-items: center;">

    <!-- Hidden Input com Nome da Turma -->
    <input type="hidden" name="nome" value="{{ $registro->nome }}" />
    
    <div class="col-md-1">
        <strong>{{ $registro->nome }}</strong>
    </div>
    <div class="col-md-2">
        {!! Form::text('horario_inicio', Helper::formataHorario( $registro->horario_inicio ), ['placeholder'=>'Horário Inicial', 'class' => 'form-control horario']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::text('horario_termino', Helper::formataHorario( $registro->horario_termino ), ['placeholder'=>'Horário Término', 'class' => 'form-control horario']) !!}
    </div>
    <div class="col-5">
        Última Edição por <strong>{{ $registro->updatedby->name }}</strong> em 
        <strong>{{ Helper::formataData( $registro->updated_at, true ) }}</strong>
        às <strong>{{ Helper::formataHorario( $registro->updated_at, true ) }}</strong>
    </div>
    {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}

</div>

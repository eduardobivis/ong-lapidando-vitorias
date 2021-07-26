<div class='form-group row'>
    <div class="col">
        {!! Form::text('name', null, ['placeholder'=>'Nome', 'class' => 'form-control']) !!}
    </div>
    <div class="col">
        {!! Form::text('email', null, ['placeholder'=>'Email', 'class' => 'form-control']) !!}
    </div>
    <div class="col">
        {!! Form::password('password', ['placeholder'=>'Senha', 'class' => 'form-control']) !!}
    </div>
</div>

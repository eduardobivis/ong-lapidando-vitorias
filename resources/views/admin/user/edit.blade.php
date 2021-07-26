@extends('layouts.admin.main')

@section('conteudo')


    <!-- Page Heading -->
    <p class="mb-4">Editar Colunista</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::model($entidade, ['route' => ['user.update', $entidade->id], 'method' => 'put', 'id' => 'edit',  'files' => true]) !!}
                @include('admin.user.fields')
                <div class="form-group">
                    {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/admin/user/edit.js') }}"></script>
@endsection
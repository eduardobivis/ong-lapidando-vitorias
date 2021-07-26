@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Editar Turmas</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            @foreach($registros as $registro)
                {!! Form::model($registro, ['route' => ['turmas.update', $registro->id], 'method' => 'put', 'id' => 'edit-'.$registro->id]) !!}

                    @include('admin.turmas.fields')
                {!! Form::close() !!}
            @endforeach

        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/jquery-validate-time.js') }}"></script>
    <script src="{{ asset('js/admin/turmas/edit.js') }}"></script>
@endsection
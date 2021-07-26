@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection 

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Editar Especialidade</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::model($registro, ['route' => ['alunos.update', $registro->id], 'method' => 'put', 'id' => 'edit']) !!}
                @include('admin.alunos.fields-edit')
            {!! Form::close() !!}
            
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery-validate-cpf.js') }}"></script>
    <script src="{{ asset('js/admin/alunos/edit.js') }}"></script>
@endsection
@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection 

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Inserir um novo Aluno</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'alunos.store', 'method' => 'post', 'id' => 'create']) !!}
                @include('admin.alunos.fields-create')
            {!! Form::close() !!}
            
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery-validate-cpf.js') }}"></script>
    <script src="{{ asset('js/admin/alunos/create.js') }}"></script>
@endsection 
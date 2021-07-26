@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Editar Presença</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::model($registro, ['route' => ['presencas.update', $registro->id], 'method' => 'put', 'id' => 'edit']) !!}
                @include('admin.presencas.fields-edit')
            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery-validate-time.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery-validate-dateBR.js') }}"></script>
    <script src="{{ asset('js/admin/presencas/edit.js') }}"></script>
@endsection
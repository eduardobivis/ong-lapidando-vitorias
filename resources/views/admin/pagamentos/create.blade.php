@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Inserir uma novo Pagamento</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            {!! Form::open(['route' => 'pagamentos.store', 'method' => 'post', 'id' => 'create']) !!}
                @include('admin.pagamentos.fields-create')
            {!! Form::close() !!}
            
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/jquery-validate-dateBR.js') }}"></script>
    <script src="{{ asset('js/admin/pagamentos/create.js') }}"></script>
@endsection
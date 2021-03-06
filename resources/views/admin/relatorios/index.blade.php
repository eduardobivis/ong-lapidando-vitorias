@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <!-- Page Heading -->
    <p class="mb-4">Escolha seu Relatório - Todos os campos são opcionais</p>

    <div class="card shadow mb-4">
        <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('relatorios.situacao') }}" style="color: #212529; text-decoration: none;">Situação</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('relatorios.presencas') }}" style="color: #212529; text-decoration: none;">Presenças</a>
            </li>
        </ul>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/relatorios/index.js') }}"></script>
@endsection
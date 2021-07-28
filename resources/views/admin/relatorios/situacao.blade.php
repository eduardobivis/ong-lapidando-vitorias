@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Relatório por Situação do Aluno</h6>
        </div>
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            <form method="get" action="{{ route('relatorios.situacao') }}">

                <div class="form-group row">
                    <div class="col-md-4">
                        <input name="log" type="checkbox" value="1" 
                            {{ array_key_exists("log", $dados) && $dados["log"] ? 'checked' : ''  }} />
                            Exibir Itens Deletados
                    </div>
                </div>
                <hr />
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="tipo">Turma</label> 
                        <select name="turmas[]" class="turmas" multiple>
                            @foreach($turmaOptions as $key => $option)
                                <option 
                                    value="{{ $key }}" 
                                    {{ ( array_key_exists("turmas", $dados) && in_array( $key, $dados["turmas"]) ) ? 'selected' : ''  }}> 
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="tipo">Situações</label> 
                        <select name="situacoes[]" class="situacoes" multiple>
                            @foreach($situacoesOptions as $key => $option)
                                <option 
                                    value="{{ $key }}" 
                                    {{ ( array_key_exists("situacoes", $dados) && in_array( $key, $dados["situacoes"]) ) ? 'selected' : ''  }}> 
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </form>

            @if( $registros )
                Total de Resultados: {{ count( $registros ) }}
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelaEmpresas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Celular</th>
                            <th>E-mail</th>
                            <th>Turma</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( $registros )
                            @foreach($registros as $registro)

                                <tr style="{{ $registro->deleted_at ? 'color: red;' : ''  }}" >
                                    <td>{{ $registro->id }}</td>
                                    <td>
                                        @if( !$registro->deleted_at )
                                            <a href="{{ route('alunos.show', $registro->id) }}">     
                                                {{ $registro->nome }}
                                            </a>
                                        @else
                                            {{ $registro->nome }}
                                        @endif
                                    </td>
                                    <td>{{ Helper::formataCPF( $registro->cpf ) }}</td> 
                                    <td>{{ Helper::formataCelular( $registro->celular ) }}</td>  
                                    <td>{{ $registro->email }}</td>
                                    <td>{{ $registro->turmas }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if( $registros )
                    {{ $registros->links() }}
                @endif
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/relatorios/index.js') }}"></script>
@endsection
@extends('layouts.admin.main')

@section('css')
    <link href="{{ asset('css/ext_libs/select2.min.css') }}" rel="stylesheet">
@endsection

@section('conteudo')

    <div class="card shadow mb-4">
        <div class="card-body">

            @if (count($errors) > 0)
                <div class="alert alert-danger pt-4">
                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                </div>
            @endif

            <form method="get" action="{{ route('relatorios.presencas') }}">

                <div class="form-group row">
                    <div class="col-md-4">
                        <input name="log" type="checkbox" value="1" 
                                {{ array_key_exists("log", $dados) && $dados["log"] ? 'checked' : ''  }} />
                                Exibir Itens Deletados                 
                    </div>
                </div>

                <div id="campos-presenca">
                    <hr />
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="tipo">Código do Aluno</label>
                            <input 
                                name="aluno_id" 
                                type="text" 
                                class="form-control aluno_id" 
                                maxlength="4"
                                value="{{ array_key_exists("aluno_id", $dados) ? $dados['aluno_id'] : ''  }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="tipo">Data Inicial</label>
                            <input 
                                name="data_inicio" 
                                type="text" 
                                class="form-control data_inicio"
                                autocomplete="off"
                                value="{{ array_key_exists("data_inicio", $dados) ? $dados['data_inicio'] : ''  }}"/>
                        </div>
                        <div class="col-md-2">
                            <label for="tipo">Data Final</label>
                            <input 
                                name="data_final" 
                                type="text" 
                                class="form-control data_final"
                                autocomplete="off"
                                value="{{ array_key_exists("data_final", $dados) ? $dados['data_final'] : ''  }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="tipo">Turma (da Presença)</label>
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
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Buscar" />
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
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Justificativa</th>
                            <th>Turma (da Presença) <i class="fas fa-question turma-hint" title="No momento do Registro"></i></th>
                            <th>Criado Por</th>
                        </tr>
                    </thead>
                    @if( $registros )
                        <tbody>
                            @foreach($registros as $registro)

                                <tr style="{{ $registro->alunos_deleted_at ? 'color: red;' : ''  }}">
                                    <td>{{ $registro->codigo }}</td>
                                    <td style="{{ $registro->alunos_deleted_at ? 'color: red;' : ''  }}">
                                        @if( !$registro->alunos_deleted_at )
                                            <a href="{{ route('alunos.show', $registro->codigo) }}">     
                                                {{ $registro->nome }}
                                            </a>
                                        @else
                                            {{ $registro->nome }}
                                        @endif
                                    </td>
                                    <td style="{{ $registro->presencas_deleted_at ? 'color: red;' : ''  }}">
                                        @if( !$registro->presencas_deleted_at )
                                            <a href="{{ route('presencas.show', $registro->presenca_id) }}">     
                                                {{ Helper::formataData( $registro->data ) }}
                                            </a>
                                        @else
                                            {{ Helper::formataData( $registro->data ) }}
                                        @endif
                                    </td>
                                    <td>{{ Helper::formataHorario( $registro->horario ) }}</td> 
                                    <td style="width: 5%">{{ $registro->justificativa }}</td>  
                                    <td class="text-center">{{ $registro->turmas }}</td>
                                    <td class="text-center">{{ $registro->criadopor }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            @if( $registros )
                {{ $registros->links() }}
            @endif
        </div>
    </div>
</div>
    
@endsection

@section('js')
    <script src="{{ asset('js/ext_libs/popper.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/ext_libs/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/relatorios/index.js') }}"></script>
@endsection
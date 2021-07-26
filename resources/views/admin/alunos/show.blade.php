@extends('layouts.admin.main')

@section('conteudo')

<!-- Hack pro Header faltando, dá pra melhorar no CSS ! -->
<p class="mb-4">&nbsp</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td class="titulo_show"> Código </td>
                        <td>{{ $registro->id }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Nome </td>
                        <td>{{ $registro->nome }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Email </td>
                        <td>{{ $registro->email }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Telefone </td>
                        <td>{{ $registro->telefoneFormatado }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Celular </td>
                        <td>{{ $registro->celularFormatado }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> RG </td>
                        <td>{{ $registro->rg }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> CPF </td>
                        <td>{{ $registro->cpfFormatado }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Turma(s) </td>
                        <td>{{ $registro->turmasString }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Situação </td>
                        <td>{{ $registro->situacao->nome }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Observação </td>
                        <td>{{ $registro->observacao }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Endereço</td>
                        <td>
                            <p>
                                {{ $registro->rua }}, {{ $registro->numero }} - {{ $registro->bairro }} ( {{ $registro->complemento }} )
                            </p>
                            <p style="line-height: 1px;"> {{ $registro->cidade->nome }} / {{ $registro->estado }} </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Código de Acesso </td>
                        <td>{{ $registro->{ 'codigo_acesso' } }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Criação</td>
                        <td>
                            por <strong>{{ $registro->createdby->name }}</strong> em 
                            <strong>{{ $registro->createdAtDate }}</strong>
                            às <strong>{{ $registro->createdAtTime }}
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Última Alteração</td>
                        <td>
                            por <strong>{{ $registro->updatedby->name }}</strong> em 
                            <strong>{{ $registro->updatedAtDate }}</strong>
                            às <strong>{{ $registro->updatedAtTime }}
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Editar</td>
                        <td>
                            <a href="{{ route('alunos.edit', $registro->id) }}">
                                <span class="fa fa-pencil-alt"></span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Deletar</td>
                        <td>
                            {!! Form::open(['route' => ['alunos.destroy', $registro->id], 'method' => 'DELETE', 'class' => 'form-deletar', 'data-modulo' => 'empresa']) !!}
                                {{ Form::button('<span class="fa fa-trash"></span>', 
                                    ['type' => 'submit', 'style' => 'color:red', 'class'=>"delete-button"] )  
                                }}                        
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3" style="display: flex; align-items: center;justify-content: space-between;">
        <h6 class="m-0 font-weight-bold text-primary">Presenças ( Ano Corrente )</h6>
        <div class="float-right">
            <a href="{{ route('presencas.create', $registro->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Novo Registro
            </a>
        </div>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="tabelaEmpresas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Turma <i class="fas fa-question turma-hint" title="No momento do Registro"></i></th>
                        <th class="icone-index">Detalhes</th>
                        <th class="icone-index">Editar</th>
                        <th class="icone-index">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registro->presencas as $presenca)
                        <tr>
                            <td>{{ $presenca->dataFormatado }}</td>
                            <td>{{ $presenca->horarioFormatado }}</td>
                            <td>{{ $presenca->turma->nome }}</td>
                            <td class="text-center">
                                <a href="{{ route('presencas.show', $presenca->id ) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('presencas.edit', $presenca->id) }}">     
                                    <span class="fa fa-pencil-alt"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                {!! Form::open(['route' => ['presencas.destroy', $presenca->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
                                    {{ Form::button('<span class="fa fa-trash"></span>', 
                                        ['type' => 'submit', 'style' => 'color:red', 'class'=>"delete-button"] )  
                                    }}                        
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 

@section('js')
    <script src="{{ asset('js/ext_libs/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/alunos/show.js') }}"></script>
@endsection
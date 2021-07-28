@extends('layouts.admin.main')

@section('conteudo')

    <div class="card shadow mb-4">
        <div class="card-body">
            <div>
                <a href="{{ route('atualizasituacao', 'tipo=inadimplentes') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mr-1">
                    <i class="fas fa-undo-alt fa-sm text-white-50"></i> Atualizar Inadimplentes
                </a>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-bordered display" id="tabelaEmpresas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th class="icone-index">Detalhes</th>
                            <th class="icone-index">Editar</th>
                            <th class="icone-index">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entidades as $entidade)
                            <tr>
                                <td>{{ $entidade->id }}</td>
                                <td>{{ $entidade->nome }}</td>
                                <td>{{ Helper::formataCPF( $entidade->cpf ) }}</td>
                                <td>{{ Helper::formataCelular( $entidade->celular ) }}</td>
                                <td>{{ $entidade->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('alunos.show', $entidade->id) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('alunos.edit', $entidade->id) }}">     
                                        <span class="fa fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    {!! Form::open(['route' => ['alunos.destroy', $entidade->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
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
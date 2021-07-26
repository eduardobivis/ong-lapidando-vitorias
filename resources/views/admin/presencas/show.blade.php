@extends('layouts.admin.main')

@section('conteudo')

<!-- Hack pro Header faltando, dá pra melhorar no CSS ! -->
<p class="mb-4">&nbsp</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Presença</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td class="titulo_show"> Data</td>
                        <td>{{ $registro->dataFormatado }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Horário </td>
                        <td>{{ $registro->horarioFormatado }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Turma </td>
                        <td>{{ $registro->turma->nome }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Aluno </td>
                        <td>
                            <a href="{{ route('alunos.show', $registro->aluno->id ) }}">    
                                {{ $registro->aluno->nome }}
                            <a>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Justificativa </td>
                        <td>{{ $registro->justificativa }}</td>
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
@endsection 

@section('js')
    <script src="{{ asset('js/adm/empresa/index-show.js') }}"></script>
@endsection
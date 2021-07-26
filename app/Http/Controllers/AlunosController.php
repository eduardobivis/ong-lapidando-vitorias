<?php

namespace App\Http\Controllers;

use Helper;

use App\Aluno;
use App\AlunoTurma;
use App\Presenca;
use App\Cidade;
use App\Turma;
use App\Situacao;

use App\Http\Requests\AlunosCreateRequest;
use App\Http\Requests\AlunosEditRequest;
use App\Http\Services\AlunoService;

//TODO - Dependency Injection is not working

class AlunosController extends Controller {

    private $alunoService;

    public function __construct( AlunoService $alunoService ){
        $this->alunoService = $alunoService;
    }

    /*
        Mudei para Entidade pois ele entendia 'registros' como 
        'registro e botava o nome do Aluno na listagem Alunos ¯\_(ツ)_/¯
    */
    public function index() {
        return view('admin.alunos.index',  ['entidades' => Aluno::all()]);
    }

    public function show(Aluno $aluno){
        return view(
            'admin.alunos.show', 
            ['titulo' => $aluno->nome, 'registro' => $aluno]
        );
    }

    public function create() {
        return view( 
            'admin.alunos.create',
            [
                'cidadeOptions' => Helper::montaOptionsSelect(Cidade::all()),
                'situacaoOptions' => Helper::montaOptionsSelect(Situacao::all()),
                'turmaOptions' => Helper::montaOptionsSelect(Turma::all())            
            ]
        );
    }

    public function store(AlunosCreateRequest $request) {
        $retorno = $this->alunoService->store( $request->all() );
        if($retorno['status']) {
            return redirect()->route('alunos.show', $retorno['registro']->id);
        }
    } 

    public function edit(String $aluno) {
        return view( 
            'admin.alunos.edit',
            [
                'registro' => Aluno::find($aluno), 
                'turmas' => 
                    AlunoTurma::where('aluno_id', $aluno)
                        ->pluck('turma_id'),
                'cidadeOptions' => Helper::montaOptionsSelect(Cidade::all()),
                'situacaoOptions' => Helper::montaOptionsSelect(Situacao::all()),
                'turmaOptions' => Helper::montaOptionsSelect(Turma::all())
            ]
        );
        return view('admin.alunos.edit', ['registro' => $aluno]);
    }

    public function update(AlunosEditRequest $request, String $aluno) {
        $retorno = $this->alunoService->update( $request->all(), $aluno );
        if($retorno['status']) {
            return redirect()->route('alunos.show', $retorno['registro']->id);
        }
    }
    
    public function destroy(String $aluno) {
        $aluno = Aluno::find($aluno);

        //Remove Presenças
        foreach( $aluno->presencas as $presenca) 
            $presenca->delete();

        foreach( $aluno->turmas as $turma) 
            $turma->delete();
            
        $aluno->delete(); 
        return redirect()->route('alunos.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;

use App\Aluno;

use App\Http\Services\AtualizaSituacaoService;

class AtualizaSituacaoController extends Controller { 

    private $atualizaSituacaoService;

    public function __construct( AtualizaSituacaoService $atualizaSituacaoService ) {
        $this->atualizaSituacaoService = $atualizaSituacaoService;
    }
    
    //Renderiza Views
    public function atualizaSituacao(Request $request) {
        switch( $request->query("tipo") ) {
            case 'inadimplentes': {
                $this->atualizaSituacaoService->atualizaInadimplentes();
            }
        }
        return view(
            'admin.alunos.index',  
            [
                'entidades' => Aluno::all(),
                'helper' => Helper::class
            ]
        );
    }  
}
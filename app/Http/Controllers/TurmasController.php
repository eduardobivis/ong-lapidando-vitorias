<?php

namespace App\Http\Controllers;

use App\Turma;

use App\Http\Requests\TurmasEditRequest;
use App\Http\Services\TurmaService;

//TODO - Dependency Injection is not working

class TurmasController extends Controller {

    private $turmaService;

    public function __construct( TurmaService $turmaService ){
        $this->turmaService = $turmaService;
    }

    public function edit() {
        return view( 
            'admin.turmas.edit',
            ['registros' => Turma::all()]
        );;
    }

    public function update(TurmasEditRequest $request, String $turma) {
        $retorno = $this->turmaService->update( $request->all(), $turma );
        return redirect()->route('turmas.edit')->withErrors($retorno['errors']);
    }

}

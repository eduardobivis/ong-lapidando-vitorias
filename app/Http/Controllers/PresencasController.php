<?php

namespace App\Http\Controllers;

use Helper;

use App\Aluno;
use App\Presenca;

use App\Http\Requests\PresencaCreateRequest;
use App\Http\Requests\PresencaEditRequest;
use App\Http\Services\PresencaService;

class PresencasController extends Controller { 

    private $presencaService;

    public function __construct( PresencaService $presencaService ) {
        $this->presencaService = $presencaService;
    }

    public function show(Presenca $presenca) {
        return view(
            'admin.presencas.show', 
            [ 'registro' => $presenca ]
        );
    }

    public function create(Aluno $aluno) {
        return view(
            'admin.presencas.create',
            [
                'registro' => $aluno,
                'helper' => Helper::class
            ]
        );
    }

    public function store(PresencaCreateRequest $request) {
        
        $retorno = $this->presencaService->store( $request->all() );
        if($retorno['status']){
            return redirect()->route('alunos.show', $retorno['registro']->aluno_id);
        }
        else{
            return view(
                'admin.presencas.create',
                ['registro' => Aluno::find( $request->get('aluno_id') )]
            )->withErrors($retorno['errors']);
        }
    }

    public function edit(Presenca $presenca) {
        return view(
            'admin.presencas.edit', 
            ['registro' => $presenca] 
        );
    }

    public function update(PresencaEditRequest $request, String $presencaId) {

        $presenca = $this->presencaService->update( $request->all(), $presencaId );
        if($retorno['status']){
            return redirect()->route('alunos.show', $retorno['registro']->aluno_id);
        }
        else {
            return view(
                'admin.presencas.edit', 
                ['registro' => Presenca::find($presencaId)] 
            )->withErrors($retorno['errors']);
        }        
    }
    
    public function destroy(String $presenca) {
        $presenca = Presenca::find($presenca);
        $aluno_id = $presenca->aluno_id;
        $presenca->delete(); 
        return redirect()->route('alunos.show', $aluno_id);
    }
    
}

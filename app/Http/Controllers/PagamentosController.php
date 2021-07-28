<?php

namespace App\Http\Controllers;

use Helper;

use App\Aluno;
use App\Pagamento;

use App\Http\Requests\PagamentoCreateRequest;
use App\Http\Requests\PagamentoEditRequest;
use App\Http\Services\PagamentoService;

//TODO - Dependency Injection is not working

class PagamentosController extends Controller {

    private $pagamentoService;

    public function __construct( PagamentoService $pagamentoService ) {
        $this->pagamentoService = $pagamentoService;
    }
    
    public function create(Aluno $aluno) {
        return view(
            'admin.pagamentos.create',
            [
                'registro' => $aluno,
                'helper' => Helper::class
            ]
        );
    }

    public function edit(Pagamento $pagamento) {
        return view(
            'admin.pagamentos.edit', 
            ['registro' => $pagamento] 
        );
    }

    public function store(PagamentoCreateRequest $request) {
        $retorno = $this->pagamentoService->store($request->all());
        if($retorno['status']){
            return redirect()->route('alunos.show', $retorno['registro']->aluno_id);
        }
        else{
            return view(
                'admin.pagamentos.create',
                ['registro' => Aluno::find( $request->get('aluno_id') )]
            )->withErrors($retorno['errors']);
        }
    }

    public function update(PagamentoEditRequest $request, String $pagamentoId) {

        $retorno = $this->pagamentoService->update( $request->all(), $pagamentoId );
        if($retorno['status']){
            return redirect()->route('alunos.show', $retorno['registro']->aluno_id);
        }
        else {
            return view(
                'admin.presencas.edit', 
                ['registro' => Pagamento::find($pagamentoId)] 
            )->withErrors($retorno['errors']);
        }    
    }

    public function destroy(String $pagamentoId) {
        $pagamento = Pagamento::find($pagamentoId);
        $aluno_id = $pagamento->aluno_id;
        $pagamento->delete(); 
        return redirect()->route('alunos.show', $aluno_id);
    }
}

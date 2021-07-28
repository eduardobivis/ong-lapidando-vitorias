<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Helper;

use App\Situacao;
use App\Turma;

use App\Http\Services\RelatorioSituacaoService;
use App\Http\Services\RelatorioPresencasService;

class RelatorioController extends Controller { 

    private $relatorioSituacaoService;
    private $relatorioPresencasService;

    public function __construct( 
        RelatorioSituacaoService $relatorioSituacaoService,
        RelatorioPresencasService $relatorioPresencasService
    ) {
        $this->relatorioSituacaoService = $relatorioSituacaoService;
        $this->relatorioPresencasService = $relatorioPresencasService;
    }
    
    //Renderiza Views
    public function index() {
        return view('admin.relatorios.index');
    }  

    //Filtra o Relaŕio
    public function resultado(Request $request) {

        $tipo = explode( "/", URL::current())[4];   
        switch( $tipo ) {
            case 'situacao' :
                $retorno = 
                    $this->relatorioSituacaoService
                        ->buscaResultados( $request->all() );
                return view(
                    'admin.relatorios.situacao', 
                    [
                        'dados' => $request->all(),
                        'helper' => Helper::class,
                        'turmaOptions' => Helper::montaOptionsSelect(Turma::all()),
                        'situacoesOptions' => Helper::montaOptionsSelect(Situacao::all()),
                        'registros' => 
                            ($retorno['status'])
                                ? $retorno['resultado']->appends($request->all()) 
                                : false
                    ]
                )->withErrors($retorno['errors']);
            case 'presencas' :
                $retorno = 
                    $this->relatorioPresencasService
                        ->buscaResultados( $request->all() );
                return view(
                    'admin.relatorios.presencas', 
                    [
                        'dados' => $request->all(),
                        'helper' => Helper::class,
                        'turmaOptions' => Helper::montaOptionsSelect(Turma::all()),
                        'registros' => 
                            ($retorno['status'])
                                ? $retorno['resultado']->appends($request->all()) 
                                : false
                    ]
                )->withErrors($retorno['errors']);
        }
        
    }
}
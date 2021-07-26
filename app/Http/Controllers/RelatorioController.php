<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Helper;

use App\Turma;

use App\Http\Services\RelatorioInadimplentesService;
use App\Http\Services\RelatorioPresencasService;

class RelatorioController extends Controller { 

    private $relatorioInadimplentesService;
    private $relatorioPresencasService;

    public function __construct( 
        RelatorioInadimplentesService $relatorioInadimplentesService,
        RelatorioPresencasService $relatorioPresencasService
    ) {
        $this->relatorioInadimplentesService = $relatorioInadimplentesService;
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
            case 'inadimplentes' :
                $retorno = 
                    $this->relatorioInadimplentesService
                        ->buscaResultados( $request->all() );
                return view(
                    'admin.relatorios.inadimplentes', 
                    [
                        'dados' => $request->all(),
                        'helper' => Helper::class,
                        'turmaOptions' => Helper::montaOptionsSelect(Turma::all()),
                        'registros' => 
                            ($retorno['status'])
                                ? $retorno['resultado']->appends($request->all()) 
                                : $retorno['resultado']
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
                                : $retorno['resultado']
                    ]
                )->withErrors($retorno['errors']);
        }
        
    }
}
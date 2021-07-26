<?php

    namespace App\Http\Interfaces;
    
    interface RelatorioServiceInterface {

        public function tratarDados( Array $dados ) : Array;
        public function validarDados( Array $dados ) : Array;
        public function buscaResultados( Array $dados ) : Array;
    }
<?php

    namespace App\Http\Services;

    use Illuminate\Support\Facades\Auth;

    abstract class AbstractEntidadeService {
     
        //Seta Usuário que criou / editou ao Criar registro
        public function setCreateOwner( Array $dados ) : Array {
            $dados['createdby_id'] = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
            $dados['updatedby_id'] = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
            return $dados;
        }

        //Seta Usuário que editou ao Editar registro
        public function setUpdateOwner( Array $dados ) : Array {
            $dados['updatedby_id'] = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
            return $dados;
        }

        abstract function store( Array $dados ) : Array;
        abstract function update( Array $dados, String $id ) : Array;
        abstract function validarDados( Array $dados ): Array;
        abstract function tratarDados( Array $dados ) : Array;
    }
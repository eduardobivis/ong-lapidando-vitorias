<?php

    namespace App\Http\Services;

    use Helper;

    use App\Pagamento;

    use App\Http\Services\AbstractEntidadeService;

    class PagamentoService extends AbstractEntidadeService {
     
        public function store( Array $dados ) : Array {
            $dados = $this->tratarDados( $dados );
            $dados = $this->setCreateOwner( $dados );
            $presenca = Pagamento::create( $dados );
            return [
                'status' => true,
                'registro' => $presenca,
                'errors' => [] 
            ];
        }

        public function update( Array $dados, String $id ) : Array {
            $dados = $this->tratarDados( $dados );
            $dados = $this->setUpdateOwner( $dados );
            $pagamento = Pagamento::find( $id );
            $pagamento->fill( $dados )->save();
            return [
                'status' => true,
                'registro' => $pagamento,
                'errors' => [] 
            ];
        }

        //Implementação obrigatória, porém não usado
        public function validarDados( Array $dados, String $id = '' ) : Array { return []; }

        public function tratarDados( Array $dados ) : Array {
            
            //Tratamento
            $dados['data'] = Helper::formataDataIn($dados['data']);

            //Casting
            $dados['aluno_id'] = (int) $dados['aluno_id'];

            return $dados;
        }
    }
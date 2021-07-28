<?php

    namespace App\Http\Services;

    use Helper;

    use App\Presenca;

    use App\Http\Services\AbstractEntidadeService;
    use App\Http\Services\PagamentoService;

    class PresencaService extends AbstractEntidadeService {

        public $turmaService;

        public function __construct( TurmaService $turmaService) {
            $this->turmaService = $turmaService;
        }
     
        public function store( Array $dados ) : Array {

            if( !empty( $this->validarDados( $dados ) ) ) {
                return [
                    'status' => false,
                    'registro' => null,
                    'errors' => $this->validarDados( $dados ) 
                ];
            }

            $dados = $this->tratarDados( $dados );
            $dados = $this->setCreateOwner( $dados );
            $presenca = Presenca::create( $dados );
            return [
                'status' => true,
                'registro' => $presenca,
                'errors' => $this->validarDados( $dados ) 
            ];
        }

        public function update( Array $dados, String $id ) : Array {

            if( !empty( $this->validarDados( $dados, $id ) ) ) {
                return [
                    'status' => false,
                    'registro' => $presenca,
                    'errors' => $this->validarDados( $dados, $id ) 
                ];
            }

            $dados = $this->tratarDados( $dados );
            $dados = $this->setUpdateOwner( $dados );
            $presenca = Presenca::find( $id );
            $presenca->fill( $dados )->save();
            return [
                'status' => true,
                'registro' => $presenca,
                'errors' => $this->validarDados( $dados, $id ) 
            ];
        }

        public function validarDados( Array $dados, String $id = '' ) : Array {

            $errors = [];

            if( !$this->turmaService->getTurma( $dados['horario'] ) ) {
                $errors[] = [
                    "turma_inexistente_error" => 
                        "Horário não corresponde a nenhuma Turma!"
                ];
            }

            return $errors;
        }

        public function tratarDados( Array $dados ) : Array {

            //Tratamento
            $dados['data'] = Helper::formataDataIn($dados['data']);

            //Turma ID
            
            $dados['turma_id'] = $this->turmaService->getTurma( $dados['horario'] );

            //Casting
            $dados['aluno_id'] = (int) $dados['aluno_id'];

            return $dados;
        }
    }
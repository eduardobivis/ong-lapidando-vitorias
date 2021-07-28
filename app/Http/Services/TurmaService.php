<?php

    namespace App\Http\Services;

    use Illuminate\Support\Facades\DB;
    use Helper;

    use App\Turma;

    use App\Http\Services\AbstractEntidadeService;

    class TurmaService extends AbstractEntidadeService {

        //Implementação obrigatória, porém não usado
        public function store( Array $dados ) : Array { return []; }

        public function update( Array $dados, String $id ) : Array {
            $dados = $this->setUpdateOwner( $dados );
            $turma = Turma::find( $id );
            $turma->fill( $dados )->save();
            return [
                'errors' => $this->validarDados( $dados, $id ) 
            ];
        }

        public function validarDados( Array $dados, String $id = '' ) : Array {

            $errors = [];

            # Horário de Início maior ou igual a Horário de Término #
            $horario_inicio = (int) str_replace( ':', '', $dados['horario_inicio'] );
            $horario_termino = (int) str_replace( ':', '', $dados['horario_termino'] );
            if( $horario_inicio >= $horario_termino) {
                $errors[] = [
                    "horario_error" => 
                        "O Horário de Término deve ser maior que o Horário de Início!"
                ];
            }

            # Turmas Intercedendo #       

            //Busca todas as turmas
            $turmas = Turma::all()->toArray();

            for( $i=0; $i<count( $turmas )-1; $i++) {

                //Trata Horários
                $horario_termino_atual = 
                    (int) str_replace( ':', '', $turmas[ $i ]['horario_termino'] );
                $horario_inicio_seguinte = 
                    (int) str_replace( ':', '', $turmas[ $i+1 ]['horario_inicio'] );

                /* 
                    Horário de Termino da Turma Atual deve ser 
                    menor que o Horário de Início da Seguinte 
                */
                if( $horario_termino_atual > $horario_inicio_seguinte ) {
                    $errors[] = [
                        "intersecao_error" => 
                            "Os horários das Turmas não podem interceder!"
                    ];
                } 
            }

            return $errors;
        }

        //Implementação obrigatória, porém não usado
        public function tratarDados( Array $dados ) : Array { return []; }

        //Busca em qual turma o Horário se encaixa, retorna falso caso não se encaixe
        public function getTurma( String $horario ) {
            $turma = DB::table('turmas')
                ->whereTime( 'horario_inicio', '<=', $horario )
                ->whereTime( 'horario_termino', '>=', $horario )->get('id');
            return isset( $turma[0] ) ? $turma[0]->id : false;
        }

    }
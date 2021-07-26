<?php

    namespace App\Http\Services;

    use App\Http\Services\EntidadeService;
    use DB;
    use Helper;

    use App\Aluno;
    use App\AlunoTurma;

    class AlunoService extends AbstractEntidadeService {
     
        public function store( Array $dados ) : Array {
            $dados = $this->tratarDados( $dados );
            $dados = $this->setCreateOwner( $dados );

            //Move turmas para um novo Array
            $key = array_search('turmas', array_keys($dados), true);
            $turmas = ( $key ) 
                ? array_splice($dados, $key, 1) 
                : [ 'turmas' => [] ];

            $aluno = Aluno::create( $dados );

            foreach( $turmas['turmas'] as $turma ) {
                AlunoTurma::create(
                    $this->setCreateOwner([
                        'aluno_id' => $aluno->id,
                        'turma_id' => $turma
                    ])
                );
            }

            return [
                'status' => true,
                'registro' => $aluno
            ];
        }

        public function update( Array $dados, String $id ) : Array {
                          
            //Move turmas para um novo Array
            $key = array_search('turmas', array_keys($dados), true);
            $turmas = ( $key ) 
                ? array_splice($dados, $key, 1) 
                : [ 'turmas' => [] ];

            //Edita Aluno
            $dados = $this->tratarDados( $dados );
            $dados = $this->setUpdateOwner( $dados );
            $aluno = Aluno::find( $id );
            $aluno->fill( $dados )->save();

            //Casts dados para Int
            $newTurmas = [];
            foreach($turmas['turmas'] as $turma) 
                $newTurmas[] = (int) $turma;

            //Busca Turmas no Banco de Dados
            $turmasAtuais = AlunoTurma::where('aluno_id', '=', $aluno->id)
                ->pluck('turma_id')->toArray();  

            //Remove Turmas
            $removeOptions = array_diff( $turmasAtuais, $newTurmas );
            if( !empty( array_diff( $turmasAtuais, $newTurmas ) ) ) {
                $tableName = (new AlunoTurma)->getTable();
                DB::table( $tableName )
                    ->where( 'aluno_id', $aluno->id )
                    ->whereIn( 'turma_id', $removeOptions )
                    ->delete();
            }

            //Add Especialidades
            $addOptions = array_diff( $newTurmas, $turmasAtuais );
            if( !empty( $addOptions) ) {
                foreach( $addOptions as $turma ) {
                    AlunoTurma::create(
                        $this->setCreateOwner([
                            'aluno_id' => $aluno->id,
                            'turma_id' => $turma
                        ])
                    );
                }
            }

            return [
                'status' => true,
                'registro' => $aluno
            ];
        }

        //Implementação obrigatória, porém não usado
        public function validarDados( Array $dados, String $id = '' ) : Array { return []; }

        public function tratarDados( Array $dados ) : Array {

            //Tratamento
            $dados['cpf'] = Helper::removeAll($dados['cpf'], [ ".", "-" ]);
            $dados['telefone'] = Helper::removeAll($dados['telefone'], [ "(", ")", "-", " " ]);
            $dados['celular'] = Helper::removeAll($dados['celular'], [ "(", ")", "-", " " ]);
            $dados['estado'] = 'PR';

            //Casting
            $dados['cidade_id'] = (int) $dados['cidade_id'];
            $dados['situacao_id'] = (int) $dados['situacao_id'];

            return $dados;
        } 
    }
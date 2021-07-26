<?php

    namespace App\Http\Services;

    use App\Http\Interfaces\RelatorioServiceInterface;
    use Illuminate\Support\Facades\DB;

    class RelatorioInadimplentesService implements RelatorioServiceInterface {
        
        public function tratarDados( Array $dados ) : Array {

            //Log
            $dados['log'] = 
                (array_key_exists('log', $dados) && $dados['log'] != '')
                    ? true : false;
                
            //Turmas
            $dados['turmas'] = 
                (array_key_exists('turmas', $dados) && $dados['turmas'] != '') 
                    ? (is_array( $dados['turmas'] ) ? $dados['turmas'] : [$dados['turmas']] )
                    : false;

            return $dados;
        }

        public function validarDados( Array $dados ) : Array {
            $errors = [];
            return $errors;
        }
        public function buscaResultados( Array $dados ) : Array {

            $dadosTratados = $this->tratarDados($dados);

            if( !empty( $this->validarDados($dadosTratados) ) || empty($dados) ) {
                return [
                    'status' => false,
                    'resultado' => null,
                    'errors' => $this->validarDados($dadosTratados)
                ];
            }

            //Set Variables (When não aceita Index de Array)
            $log = $dadosTratados['log'];
            $turmas = $dadosTratados['turmas'];

            //Query
            $resultado =  
                \DB::table("alunos")
                    ->select(
                        "alunos.id", 
                        "alunos.nome", 
                        "alunos.cpf",
                        "alunos.celular",
                        "alunos.email",
                        "alunos.deleted_at",
                        DB::raw(
                            "group_concat(
                                turmas.nome ORDER BY turmas.id SEPARATOR ', '
                            ) AS turmas"
                        ),
                        
                    )

                    //Joins
                    ->join("aluno_turmas","aluno_turmas.aluno_id","=","alunos.id")
                    ->join("turmas","aluno_turmas.turma_id","=","turmas.id")
                    ->join("situacoes","alunos.situacao_id","=","situacoes.id")

                    //Condicionais
                    ->when($turmas, function ($query) use ($turmas) {
                        return $query->whereIn('turmas.id', $turmas);
                    })
                    ->when(!$log, function ($query) use ($turmas) {
                        return $query->whereNull('alunos.deleted_at');
                    })
                    ->where('situacoes.nome', 'Inadimplente')
                    ->groupBy("alunos.id")

                    //Paginação
                    ->paginate(25);
            
            return [
                'status' => true,
                'resultado' => $resultado,
                'errors' => []
            ];
        }
    }
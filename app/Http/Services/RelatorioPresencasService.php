<?php

    namespace App\Http\Services;

    use App\Aluno;
    use App\Http\Interfaces\RelatorioServiceInterface;

    class RelatorioPresencasService implements RelatorioServiceInterface {
        
        public function tratarDados( Array $dados ) : Array {

            //Log
            $dados['log'] = 
                (array_key_exists('log', $dados) && $dados['log'] != '')
                    ? true : false;

            //Código
            $dados['aluno_id'] = 
                (array_key_exists('aluno_id', $dados) && $dados['aluno_id'] != '') 
                    ? (int) $dados['aluno_id']
                    : false;

            //Data Início
            $dados['data_inicio'] = 
                (array_key_exists('data_inicio', $dados) && $dados['data_inicio'] != '') 
                    ? date_create_from_format('d/m/Y', $dados['data_inicio']) 
                    : false;
            // Data Final
            $dados['data_final'] = 
                (array_key_exists('data_final', $dados) && $dados['data_final'] != '') 
                    ? date_create_from_format('d/m/Y', $dados['data_final']) 
                    : false;

            //Turmas
            $dados['turmas'] = 
                (array_key_exists('turmas', $dados) && $dados['turmas'] != '') 
                    ? (is_array( $dados['turmas'] ) ? $dados['turmas'] : [$dados['turmas']] )
                    : false;
            
            return $dados;
        }

        public function validarDados( Array $dados ) : Array {

            $errors = [];
            
            //Nenhum dado passado
            if( empty($dados) ) return [''];

            //Data de ínicio superior a Data Final
            if( 
                $dados['data_inicio'] && $dados['data_final'] &&
                $dados['data_inicio'] > $dados['data_final'] 
            ) {
                $errors[] = [
                    'error_datas' => 'Data de Início não pode ser maior que Data Final'
                ];
            } 

            if($dados['aluno_id'] && !Aluno::find($dados['aluno_id'])) {
                $errors[] = [ 'error_aluno' => 'Aluno não Existe' ];
            }

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

            $log = $dadosTratados['log'];
            $aluno_id = $dadosTratados['aluno_id'];
            $data_inicio = $dadosTratados['data_inicio'];
            $data_final = $dadosTratados['data_final'];
            $turmas = $dadosTratados['turmas'];

            $resultado =  
                \DB::table("alunos")
                    ->select(
                        "alunos.id AS codigo", 
                        "alunos.nome", 
                        "alunos.deleted_at AS alunos_deleted_at",
                        "presencas.id AS presenca_id",
                        "presencas.data",    
                        "presencas.horario",
                        "presencas.justificativa",
                        "turmas.nome AS turmas",
                        "users.name AS criadopor",
                        "presencas.deleted_at AS presencas_deleted_at"
                    )

                    //Joins
                    ->join("presencas","alunos.id","=","presencas.aluno_id")
                    ->join("turmas","presencas.turma_id","=","turmas.id")
                    ->join("users","presencas.createdby_id","=","users.id")

                    //Condicionais
                    ->when($aluno_id, function ($query) use ($aluno_id) {
                        return $query->where('alunos.id', $aluno_id);
                    })
                    ->when($data_inicio, function ($query) use ($data_inicio) {
                        return $query->whereDate('presencas.data', '>=', $data_inicio);
                    })
                    ->when($data_final, function ($query) use ($data_final) {
                        return $query->whereDate('presencas.data', '<=', $data_final);
                    })
                    ->when($turmas, function ($query) use ($turmas) {
                        return $query->whereIn('turmas.id', $turmas);
                    })
                    ->when(!$log, function ($query) use ($turmas) {
                        return $query->whereNull('alunos.deleted_at');
                    })
                    ->when(!$log, function ($query) use ($turmas) {
                        return $query->whereNull('presencas.deleted_at');
                    })

                    ->paginate(3);

            return [
                'status' => true,
                'resultado' => $resultado,
                'errors' => []
            ];
        }
        public function geraHTML( Array $dados ) : String {
            return [];
        }

    }
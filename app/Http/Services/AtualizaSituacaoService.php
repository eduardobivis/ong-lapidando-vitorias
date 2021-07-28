<?php

    namespace App\Http\Services;

    use App\Aluno;
    use App\Situacao;

    class AtualizaSituacaoService {

        public function atualizaInadimplentes(){
            $alunos = Aluno::all();
            $situacao = Situacao::where('nome', 'Inadimplente')->pluck('id')[0];
            $mesAtual = date('m');
            $anoAtual = date('Y');

            foreach($alunos as $aluno) {

                $pagamentoRealizado = false;
                foreach($aluno->pagamentos as $pagamento) {
                    $mesData = 
                        date_create_from_format('Y-m-d', $pagamento->data)->format('m');
                    $anoData = 
                        date_create_from_format('Y-m-d', $pagamento->data)->format('Y');
                    
                    if( $mesData == $mesAtual && $anoData == $anoData )
                        $pagamentoRealizado = true;
                }
                if(!$pagamentoRealizado){
                    $aluno->situacao_id = $situacao;
                    $aluno->save();
                }
            }
        }
    }
<?php

    namespace App\Http\Services;

    use \Datetime;
    use \DateInterval;
    use \DatePeriod;

    use App\Aluno;
    use App\Situacao;

    class AtualizaSituacaoService {

        public function atualizaInadimplentes(){

            $alunos = Aluno::all();
            $adimplente_situacao_id = 
                Situacao::where('nome', 'Adimplente')->pluck('id')[0];
            $inadimplente_situacao_id = 
                Situacao::where('nome', 'Inadimplente')->pluck('id')[0];

            foreach($alunos as $aluno) {

                # Pagamentos Antigos -> Da Data de Matrícula até Mês Anterior ao Atual #

                $inicio    = new DateTime($aluno->data_matricula);
                $final     = new DateTime(date("Y-m-t", strtotime("-1 month")));
                $intervalo = DateInterval::createFromDateString('1 month');
                $periodo   = new DatePeriod($inicio, $intervalo, $final);

                $inadimplente = false;
                $pagamentos = $aluno->pagamentos()->get();
                
                foreach ($periodo as $data) {

                    $mes = $data->format("m");
                    $ano = $data->format("Y");
                    
                    //Busca Pagamento Para Mês e Ano
                    $pagamentoMes = $this->buscarPagamentoMes($pagamentos, $mes, $ano);

                    //Caso não encontre seta como inadimplente
                    if( is_null($pagamentoMes) ) $inadimplente = true;
                    
                }

                # Pagamento Mês Atual #

                $diaAtual = (int) date('d');
                $diaPagamento = (int) $aluno->dia_pagamento;
                $ultimoDiaMesAtual = (int) date('t');

                /*
                    Dia pode ser 31 em Mês de 30 dias, entraria no case erronamente!
                    Último dia só passa a contar como inadimplente no dia 01 do mês 
                    seguinte
                */
                if( $diaAtual > $diaPagamento && $diaPagamento < $ultimoDiaMesAtual ) {
                    
                    $mesAtual = date('m');
                    $anoAtual = date('Y');

                    $pagamentoMes = $this->buscarPagamentoMes(
                        $pagamentos, $mesAtual, $anoAtual
                    );

                    if( is_null($pagamentoMes) ) $inadimplente = true;

                }

                if($inadimplente) $aluno->situacao_id = $inadimplente_situacao_id;
                else $aluno->situacao_id = $adimplente_situacao_id;
                $aluno->save();
            }
        }

        public function buscarPagamentoMes($pagamentos, $mes, $ano) {
            return $pagamentos->filter(function($pagamento) use ($mes, $ano) {

                $dataPagamento = new DateTime($pagamento->data);
                $mesPagamento = $dataPagamento->format('m');
                $anoPagamento = $dataPagamento->format('Y');

                return ( $mesPagamento == $mes && $anoPagamento == $ano );

            })->first();
        }
    }

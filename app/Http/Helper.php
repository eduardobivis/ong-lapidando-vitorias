<?php

    //Criado em config/app -> alias Array
    namespace App\Http;
    
    class Helper {
        
        public static function getDataAtual() {
            return date('d/m/Y');
        }
    
        public static function getHorarioAtual() {
            return date('H:i');
        }

        public static function formataData($data, $timestamp = false) {
            return 
                ($timestamp)
                    ? date_create_from_format('Y-m-d H:i:s', $data)->format('d/m/Y')
                    : date_create_from_format('Y-m-d', $data)->format('d/m/Y');
        }

        public static function formataDataIn($data) {
            return date_create_from_format('d/m/Y', $data)->format('Y-m-d');
        }

        public static function formataHorario($horario, $timestamp = false) {
            return 
                ($timestamp)
                    ? date_create_from_format('Y-m-d H:i:s', $horario)->format('H:i') 
                    : date_create_from_format('H:i:s', $horario)->format('H:i');
        }

        public static function formataCPF($cpf) {
            return 
                substr($cpf, 0, 3) . '.' .
                substr($cpf, 3, 3) . '.' .
                substr($cpf, 6, 3) . '-' .
                substr($cpf, 9, 2);
        }

        public static function formataTelefone($telefone) {
            return 
            '(' .substr($telefone, 0, 2) . ') ' .
            substr($telefone, 2, 4) . '-' .
            substr($telefone, 6, 4);
        }

        public static function formataCelular($celular) {
            return 
                ( strlen( $celular ) == 11 ) 
                    ? 
                        '(' .substr($celular, 0, 2) . ') ' .
                        substr($celular, 2, 5) . '-' .
                        substr($celular, 7, 4)
                    :
                        '(' .substr($celular, 0, 2) . ') ' .
                        substr($celular, 2, 4) . '-' .
                        substr($celular, 6, 4);
        }

        public static function montaOptionsSelect($registros) {
            $options  = array();
            foreach($registros as $registro) $options[$registro->id] = $registro->nome;
            return $options;
        }

        public static function getDiaPagamento() {
            $dias = [];
            for( $i=1; $i <=31; $i++) {
                $dia = ( $i < 10 ) ? '0'.$i : (String) $i;
                $dias[$dia] = $dia;
            }  
            return $dias;
        }

        public static function removeAll( String $string, Array $conditions ) : String {
            foreach( $conditions as $condition ) {
                $string = str_replace( $condition, "", $string );
            }
            return $string;
        }
    }
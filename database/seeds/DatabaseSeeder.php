<?php

use Illuminate\Database\Seeder;
use App\Aluno;
use App\AlunoTurma;
use App\Cidade;
use App\Pagamento;
use App\Presenca;
use App\Situacao;
use App\Turma;
use App\User;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        //Usuário
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret')
        ]);

        //Situacao
        Situacao::create([ 'nome' => 'Adimplente' ]);
        Situacao::create([ 'nome' => 'Inadimplente' ]);
        Situacao::create([ 'nome' => 'Ausente' ]);
        Situacao::create([ 'nome' => 'Ex-Aluno' ]);

        //Situacao
        Turma::create([ 
            'nome' => 'Manhã',
            'horario_inicio' => '08:00',
            'horario_termino' => '12:00',
            'updatedby_id' => '1'
        ]);
        Turma::create([ 
            'nome' => 'Tarde',
            'horario_inicio' => '13:00',
            'horario_termino' => '18:00',
            'updatedby_id' => '1'
        ]);
        Turma::create([ 
            'nome' => 'Noite',
            'horario_inicio' => '19:00',
            'horario_termino' => '23:00',
            'updatedby_id' => '1'
        ]);
        //Cidades
        Cidade::create([ 'nome' => 'Adrianópolis' ]);
        Cidade::create([ 'nome' => 'Agudos do Sul' ]);
        Cidade::create([ 'nome' => 'Almirante Tamandaré' ]);
        Cidade::create([ 'nome' => 'Araucária' ]);
        Cidade::create([ 'nome' => 'Balsa Nova' ]);
        Cidade::create([ 'nome' => 'Bocaiúva do Sul' ]);
        Cidade::create([ 'nome' => 'Campina Grande do Sul' ]);
        Cidade::create([ 'nome' => 'Campo do Tenente' ]);
        Cidade::create([ 'nome' => 'Campo Largo' ]);
        Cidade::create([ 'nome' => 'Campo Magro' ]);
        Cidade::create([ 'nome' => 'Cerro Azul' ]);
        Cidade::create([ 'nome' => 'Colombo' ]);
        Cidade::create([ 'nome' => 'Contenda' ]);
        Cidade::create([ 'nome' => 'Curitiba' ]);
        Cidade::create([ 'nome' => 'Doutor Ulysses' ]);
        Cidade::create([ 'nome' => 'Fazenda Rio Grande' ]);
        Cidade::create([ 'nome' => 'Itaperuçu' ]);
        Cidade::create([ 'nome' => 'Lapa' ]);
        Cidade::create([ 'nome' => 'Manditiruba' ]);
        Cidade::create([ 'nome' => 'Piên' ]);
        Cidade::create([ 'nome' => 'Pinhais' ]);
        Cidade::create([ 'nome' => 'Piraquara' ]);
        Cidade::create([ 'nome' => 'Quatro Barras' ]);
        Cidade::create([ 'nome' => 'Quitandinha' ]);
        Cidade::create([ 'nome' => 'Rio Branco do Sul' ]);
        Cidade::create([ 'nome' => 'Rio Negro' ]);
        Cidade::create([ 'nome' => 'São José dos Pinhais' ]);
        Cidade::create([ 'nome' => 'Tijucas do Sul' ]);
        Cidade::create([ 'nome' => 'Tunas do Paraná' ]);

        Aluno::create([
            'nome' => 'Eduardo Marinho dos Santos',
            'email' => 'bevis_eduardo@hotmail.com',
            'telefone' => '4130890386',
            'celular' => '41988646308',
            'rg' => '103515041',
            'cpf' => '08157187990',
            'observacao' => 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
            'rua' => 'Eduardo Luiz Piana',
            'numero' => '400',
            'bairro' => 'Cidade Industrial',
            'complemento' => 'Bloco 2 Ap 203',
            'estado' => 'PR',
            'codigo_acesso' => '12345',
            'dia_pagamento' => '10',
            'data_matricula' => '2021-01-10',
            'cidade_id' => '14',
            'situacao_id' => '1',
            'createdby_id' => '1',
            'updatedby_id' => '1'
        ]);

        Presenca::create([
            'aluno_id' => '1',
            'data' => '2021-10-10',
            'horario' => '10:00',
            'turma_id' => '1',
            'justificativa' => 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
            'createdby_id' => '1',
            'updatedby_id' => '1'
        ]);

        Pagamento::create([
            'aluno_id' => '1',
            'data' => '2021-10-10',
            'observacao' => 'ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium',
            'createdby_id' => '1',
            'updatedby_id' => '1'
        ]);

        AlunoTurma::create([
            'aluno_id' => '1',
            'turma_id' => '1',
            'createdby_id' => '1',
            'updatedby_id' => '1'
        ]);

        AlunoTurma::create([
            'aluno_id' => '1',
            'turma_id' => '2',
            'createdby_id' => '1',
            'updatedby_id' => '1'
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}

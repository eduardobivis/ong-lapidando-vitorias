<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunosEditRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules() {
        return [
            'nome' => 'required|max:100',
            'email' => 'required|email|max:100',
            'telefone' => 'required|max:20',
            'celular' => 'required|max:20',
            'rg' => 'required|max:20',
            'cpf' => 'required|max:20',
            'turmas' => 'required',
            'situacao_id' => 'required',
            'observacao' => 'max:200',
            'rua' => 'required|max:100',
            'numero' => 'required|max:10',
            'complemento' => 'max:200',
            'bairro' => 'required|max:100',
            'cidade_id' => 'required',
            'codigo_acesso' => 'required|max:200',
            'dia_pagamento' => 'required',
            'dia_pagamento.required' => 'O campo Dia de Pagamento é obrigatório',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.max' => 'O campo Nome não pode conter mais de 100 caracteres',
            'email.required' => 'O campo Email é obrigatório',
            'email.email' => 'Insira um Email válido',
            'email.max' => 'O campo E-mail não pode conter mais de 100 caracteres',
            'telefone.required' => 'O campo Telefone é obrigatório',
            'telefone.max' => 'O campo Telefone não pode conter mais de 20 caracteres',
            'celular.required' => 'O campo Celular é obrigatório',
            'celular.max' => 'O campo Celular não pode conter mais de 20 caracteres',
            'rg.required' => 'O campo RG é obrigatório',
            'rg.max' => 'O campo RG não pode conter mais de 20 caracteres',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.max' => 'O campo CPF não pode conter mais de 20 caracteres',
            'turmas.required' => 'O campo Turma é obrigatório',
            'situacao_id.required' => 'O campo Situação é obrigatório',
            'observacao.max' => 'O campo Observação não pode conter mais de 200 caracteres',
            'rua.required' => 'O campo Rua é obrigatório',
            'rua.max' => 'O campo Rua não pode conter mais de 100 caracteres',
            'numero.required' => 'O campo Número é obrigatório',
            'numero.max' => 'O campo Número não pode conter mais de 100 caracteres',
            'complemento.max' => 'O campo Complemento não pode conter mais de 200 caracteres',
            'bairro.required' => 'O campo Bairro é obrigatório',
            'bairro.max' => 'O campo Bairro não pode conter mais de 100 caracteres',
            'cidade_id.required' => 'O campo Cidade é obrigatório',
            'codigo_acesso.required' => 'O campo Código de Acesso é obrigatório',
            'codigo_acesso.max' => 'O campo Código de Acesso não pode conter mais de 200 caracteres',
        ];
    }
}

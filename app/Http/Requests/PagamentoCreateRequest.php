<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagamentoCreateRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules() {
        return [
            'data' => 'required|date_format:d/m/Y',
            'observacao' => 'max:200'
        ];
    }

    public function messages() {
        return [
            'data.required' => 'O campo Data é obrigatório',
            'data.date' => 'Insira uma Data válida',
            'observacao.max' => 'O campo Observação não pode conter mais de 200 caracteres'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresencaCreateRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules() {
        return [
            'data' => 'required|date_format:d/m/Y',
            'horario' => 'required|date_format:H:i',
            'justificativa' => 'max:200'
        ];
    }

    public function messages() {
        return [
            'data.required' => 'O campo Data é obrigatório',
            'data.date' => 'Insira uma Data válida',
            'horario.required' => 'O campo Horário é obrigatório',
            'horario.time' => 'Insira um Horário válido',
            'justificativa.max' => 'O campo Justificativa não pode conter mais de 200 caracteres'
        ];
    }
}

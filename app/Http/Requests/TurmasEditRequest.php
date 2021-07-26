<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmasEditRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules() {
        return [
            'nome' => 'required',
            'horario_inicio' => 'required|date_format:H:i',
            'horario_termino' => 'required|date_format:H:i'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'horario_inicio.required' => 'O campo Horário de Início é obrigatório',
            'horario_inicio.date' => 'Insira um Horário de Início válido',
            'horario_termino.required' => 'O campo Horário de Termino é obrigatório',
            'horario_termino.time' => 'Insira um Horário de Término válido'
        ];
    }
}

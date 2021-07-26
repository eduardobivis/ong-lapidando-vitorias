<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest {
    
    public function authorize() { return true; }

    public function rules() {
        return [
            'name' => 'required', 
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'email.required'  => 'O campo Email é obrigatório',
            'email.email'  => 'O campo Email é inválido',
            'email.unique'  => 'Esse E-mail já esta cadastrado na nossa Base de Dados',
            'password.required'  => 'O campo Senha é obrigatório'
        ];
    }
}

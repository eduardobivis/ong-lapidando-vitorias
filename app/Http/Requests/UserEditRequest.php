<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest {
    
    public function authorize() { return true; }

    public function rules() {
        $id = $this->route('user');
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'email.required'  => 'O campo Email é obrigatório',
            'email.email'  => 'O campo Whatsapp é obrigatório',
            'email.unique'  => 'Esse E-mail já esta cadastrado na nossa Base de Dados',
        ];
    }
}

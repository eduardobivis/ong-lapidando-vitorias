<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
    
    protected $fillable = [
        'name', 'descricao', 'permissao', 'foto','email', 'whatsapp', 'password'
    ];
    
}

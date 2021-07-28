<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Helper;

use App\Aluno;

class Pagamento extends Entidade {
    
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [ 'data',  'aluno_id',  'createdby_id', 'updatedby_id' ];

    //Relações
    public function aluno () {
        return $this->belongsTo(Aluno::class);
    }
}

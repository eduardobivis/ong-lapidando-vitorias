<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Turma;

class AlunoTurma extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [ 'aluno_id', 'turma_id', 'createdby_id', 'updatedby_id' ];

    public function turma () {
        return $this->belongsTo(Turma::class);
    }
}

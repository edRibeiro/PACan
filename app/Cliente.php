<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sobrenome', 'data_nascimento', 'cpf', 'celular', 'email',
    ];

    public function getFullCPF(){
        return mask($this->cpf, '###.###.###-##');
    }

    function getNomeCompleto()
    {
        return $this->nome.' '.$this->sobrenome;
    }
}

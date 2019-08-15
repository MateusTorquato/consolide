<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'codigo_identificacao',
        'nome',
        'cpf',
        'telefone',
        'email',
        'endereco',
        'data_registro',
    ];

    public function setCpfAttribute($cpf)
    {
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $this->attributes['cpf'] = $cpf;
    }

    public function getCpfAttribute($cpf)
    {
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 7, 3) . '-' . substr($cpf, -2);
    }

    public function setTelefoneAttribute($telefone)
    {
        $telefone = str_replace('(', '', $telefone);
        $telefone = str_replace(')', '', $telefone);
        $telefone = str_replace('-', '', $telefone);
        $telefone = str_replace(' ', '', $telefone);
        $this->attributes['telefone'] = $telefone;
    }

    public function getTelefoneAttribute($telefone)
    {
        if (strlen($telefone) == 11) {
            return '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7, 4);
        } else {
            return '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 4) . '-' . substr($telefone, 6, 4);
        }
    }

    public function rules()
    {
        return [
            'codigo_identificacao' => 'required',
            'nome' => 'required|min:2',
            'cpf' => 'required|min:11|max:11',
            'data_registro' => 'required',
            'email' => 'required|email',
        ];
    }
}

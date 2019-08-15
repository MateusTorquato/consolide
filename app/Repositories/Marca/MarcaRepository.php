<?php

namespace App\Repositories\Marca;

use Illuminate\Support\Facades\DB;
use App\Marca;
use Illuminate\Support\Facades\Validator;

class MarcaRepository
{
    protected $error = "";

    public function criaOuAtualizaMarca($dados, $marca = null)
    {
        try {
            DB::beginTransaction();
            $marca = $marca instanceof Marca ? $marca : new Marca();
            $marca->fill($dados);

            $validator = Validator::make($dados, $marca->rules());
            if ($validator->fails()) {
                DB::rollback();
                $this->error = implode(' ', $validator->messages()->all());
                return false;
            }

            $marca->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function getError()
    {
        return $this->error;
    }
}
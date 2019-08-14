<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Marca::query();
        if (!empty($request->codigo_identificacao)) {
            $query->where('codigo_identificacao', 'like', '%' . $request->codigo_identificacao . '%');
        }

        if (!empty($request->nome)) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $marcas = $query->paginate(env('APP_PAGINACAO'));
        return view('marcas.index')
            ->with(compact('marcas'))
            ->with(compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = new Marca();
        return view('marcas.create', compact('marca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        $marca = new Marca();
        $marca->fill($request->all());
        $marca->saveOrFail();
        return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso.');
    }

    protected function rules()
    {
        return [
            'codigo_identificacao' => 'required',
            'nome' => 'required|min:2',
            'cpf' => 'required|min:11|max:11',
            'data_registro' => 'required',
            'email' => 'required|email',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $this->validate($request, $this->rules($marca));
        $marca->fill($request->all());
        $marca->saveOrFail();
        return redirect()->route('marcas.index')->with('success', 'Marca atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}

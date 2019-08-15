<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Repositories\Marca\MarcaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
    public function store(Request $request, MarcaRepository $repository)
    {
        if ($repository->criaOuAtualizaMarca($request->all())) {
            return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso.');
        } else {
            return redirect()->back()->withInput(Input::all())->withErrors('Erro ao criar marca. ' . $repository->getError());
        }
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
    public function update(Request $request, Marca $marca, MarcaRepository $repository)
    {
        if ($repository->criaOuAtualizaMarca($request->all(), $marca)) {
            return redirect()->route('marcas.index')->with('success', 'Marca atualizada com sucesso.');
        } else {
            return redirect()->back()->withInput(Input::all())->withErrors('Erro ao atualizar marca. ' . $repository->getError());
        }
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

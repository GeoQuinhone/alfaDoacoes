<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstituicaoController extends Controller
{
    public function index()
{
    $instituicoes = Instituicao::where('ativo', true)->get();
    return view('instituicoes.index', compact('instituicoes'));
}

    public function create()
    {
        return view('instituicoes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'cnpj' => 'required|string|size:18|unique:instituicoes',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:instituicoes',
            'endereco' => 'nullable|string',
            'sobre' => 'nullable|string',
            'categoria' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Instituicao::create($request->all());

        return redirect()->route('instituicoes.index')
            ->with('success', 'Instituição cadastrada com sucesso!');
    }

    public function show(Instituicao $instituicao)
    {
        return view('instituicoes.show', compact('instituicao'));
    }

    public function edit(Instituicao $instituicao)
    {
        return view('instituicoes.edit', compact('instituicao'));
    }

    public function update(Request $request, Instituicao $instituicao)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'cnpj' => 'required|string|size:18|unique:instituicoes,cnpj,' . $instituicao->id,
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:instituicoes,email,' . $instituicao->id,
            'endereco' => 'nullable|string',
            'sobre' => 'nullable|string',
            'categoria' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $instituicao->update($request->all());

        return redirect()->route('instituicoes.index')
            ->with('success', 'Instituição atualizada com sucesso!');
    }

    public function destroy(Instituicao $instituicao)
    {
        $instituicao->update(['ativo' => false]);

        return redirect()->route('instituicoes.index')
            ->with('success', 'Instituição desativada com sucesso!');
    }
}

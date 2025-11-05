<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index()
    {
        $itens = Item::with('instituicao')->get();
        return view('itens.index', compact('itens'));
    }

    public function create()
    {
        $instituicoes = Instituicao::where('ativo', true)->get();
        return view('itens.create', compact('instituicoes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:500',
            'categoria' => 'required|string|max:50',
            'quantidade_disponivel' => 'required|integer|min:0',
            'quantidade_necessaria' => 'required|integer|min:0',
            'instituicao_id' => 'required|exists:instituicoes,id',
            'urgente' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Item::create($request->all());

        return redirect()->route('itens.index')
            ->with('success', 'Item cadastrado com sucesso!');
    }

    public function show(Item $item)
    {
        return view('itens.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $instituicoes = Instituicao::where('ativo', true)->get();
        return view('itens.edit', compact('item', 'instituicoes'));
    }

    public function update(Request $request, Item $item)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:500',
            'categoria' => 'required|string|max:50',
            'quantidade_disponivel' => 'required|integer|min:0',
            'quantidade_necessaria' => 'required|integer|min:0',
            'instituicao_id' => 'required|exists:instituicoes,id',
            'urgente' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $item->update($request->all());

        return redirect()->route('itens.index')
            ->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('itens.index')
            ->with('success', 'Item excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Doacao;
use App\Models\Item;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DoacaoController extends Controller
{
    public function index()
    {
        $doacoes = Doacao::with(['item', 'doador', 'instituicao'])->get();
        return view('doacoes.index', compact('doacoes'));
    }

    public function create()
    {
        $itens = Item::all();
        $instituicoes = Instituicao::where('ativo', true)->get();
        return view('doacoes.create', compact('itens', 'instituicoes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|exists:itens,id',
            'instituicao_id' => 'required|exists:instituicoes,id',
            'quantidade' => 'required|integer|min:1',
            'data_doacao' => 'required|date',
            'tipo' => 'required|in:material,financeiro,voluntariado',
            'observacoes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Doacao::create([
            'item_id' => $request->item_id,
            'doador_id' => Auth::id(),
            'instituicao_id' => $request->instituicao_id,
            'quantidade' => $request->quantidade,
            'data_doacao' => $request->data_doacao,
            'tipo' => $request->tipo,
            'status' => 'pendente',
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('doacoes.index')
            ->with('success', 'Doação registrada com sucesso!');
    }

    public function show(Doacao $doacao)
    {
        return view('doacoes.show', compact('doacao'));
    }

    public function edit(Doacao $doacao)
    {
        $itens = Item::all();
        $instituicoes = Instituicao::where('ativo', true)->get();
        return view('doacoes.edit', compact('doacao', 'itens', 'instituicoes'));
    }

    public function update(Request $request, Doacao $doacao)
    {
        $validator = Validator::make($request->all(), [
            'item_id' => 'required|exists:itens,id',
            'instituicao_id' => 'required|exists:instituicoes,id',
            'quantidade' => 'required|integer|min:1',
            'data_doacao' => 'required|date',
            'tipo' => 'required|in:material,financeiro,voluntariado',
            'status' => 'required|in:pendente,confirmada,entregue,cancelada',
            'observacoes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $doacao->update($request->all());

        return redirect()->route('doacoes.index')
            ->with('success', 'Doação atualizada com sucesso!');
    }

    public function destroy(Doacao $doacao)
    {
        $doacao->delete();

        return redirect()->route('doacoes.index')
            ->with('success', 'Doação excluída com sucesso!');
    }

    public function minhasDoacoes()
    {
        $doacoes = Doacao::where('doador_id', Auth::id())
            ->with(['item', 'instituicao'])
            ->get();

        return view('doacoes.minhas', compact('doacoes'));
    }
}

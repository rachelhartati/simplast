<?php

namespace App\Http\Controllers;

use App\Models\AgentReturn;
use App\Models\Item;
use Illuminate\Http\Request;

class AgentReturnController extends Controller
{
    public function index()
    {
        $returns = AgentReturn::with('agent', 'item')
            ->where('agent_id', auth()->user()->agent_id)
            ->latest()
            ->get();
        return view('agent_return.index', compact('returns'));
    }

    public function create()
    {
        $items = Item::all();
        return view('agent_return.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'jumlah_pcs' => 'required|numeric|min:1',
            'tanggal_return' => 'required|date',
        ]);

        AgentReturn::create([
            'agent_id' => auth()->user()->agent_id,
            'item_id' => $request->item_id,
            'jumlah_pcs' => $request->jumlah_pcs,
            'tanggal_return' => $request->tanggal_return,
        ]);

        return redirect()->route('agent-return.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $return = AgentReturn::with('agent', 'item')->findOrFail($id);
        return view('agent_return.show', compact('return'));
    }

    public function edit($id)
    {
        $return = AgentReturn::findOrFail($id);
        $items = Item::all();
        return view('agent_return.edit', compact('return', 'items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'jumlah_pcs' => 'required|numeric|min:1',
            'tanggal_return' => 'required|date',
        ]);

        $return = AgentReturn::findOrFail($id);
        $return->update([
            'item_id' => $request->item_id,
            'jumlah_pcs' => $request->jumlah_pcs,
            'tanggal_return' => $request->tanggal_return,
        ]);

        return redirect()->route('agent-return.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $return = AgentReturn::findOrFail($id);
        $return->delete();
        return redirect()->route('agent-return.index')->with('success', 'Data berhasil dihapus');
    }
}
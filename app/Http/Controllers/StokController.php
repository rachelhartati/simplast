<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stok;
use App\Models\Item;

class StokController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }

    public function index(){
        $stok = Stok::all();
        $item = Item::all();
        return view('stok.index', compact('stok', 'item'));
    }

    public function create(){
        $item = Item::all();
        return view('stok.create', compact('item'));
    }

    public function store(Request $request){
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'jumlah_barang' => 'required|numeric',
        ]);

        $stok = Stok::create([
            'item_id' => $request->item_id,
            'jumlah_barang' => $request->jumlah_barang
        ]);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan');
    }

    public function edit($id){
        $stok = Stok::findOrFail($id);
        $item = Item::all();
        return view('stok.edit', compact('stok', 'item'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'item_id' => 'required|exists:item,id',
            'jumlah_barang' => 'required|numeric'
        ]);

        $stok = Stok::findOrFail($id);
        $stok->update([
            'item_id' => $request->item_id,
            'jumlah_barang' => $request->jumlah_barang
        ]);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui');
    }

    public function destroy($id){
        $stok = Stok::findOrFail($id);
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus');
    }
}

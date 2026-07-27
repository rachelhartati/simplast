<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(Request $request){
        $query = Item::query();

        if ($request->filled('search')) {
            $query->where('nama_item', 'like', '%' . $request->search . '%');
        }

        $item = $query->paginate(10)->withQueryString();
        return view('item.item', compact('item'));
    }

    public function create(){
        return view('item.tambah');
    }

    public function store(Request $request){
        $request->validate([
            'nama_item' => 'required|string',
            'harga_barang' => 'required|numeric',
            'stok' => 'nullable|integer|min:0',
        ]);

        $item = Item::create([
            'nama_item' => $request->nama_item,
            'harga_barang' => $request->harga_barang,
            'stok' => $request->stok ?? 0,
        ]);

        return redirect()->route('item.index')->with('success', 'Item berhasil ditambahkan');
    }

    public function edit($id){
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_item' => 'required|string',
            'harga_barang' => 'required|numeric',
            'stok' => 'nullable|integer|min:0'
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'nama_item' => $request->nama_item,
            'harga_barang' => $request->harga_barang,
            'tarif_per_pcs'=>$request->tarif_per_pcs,
            'stok' => $request->stok,
        ]);

        return redirect()->route('item.index')->with('success', 'Item berhasil diperbarui');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('item.index')->with('success', 'Item berhasil dihapus');
    }
}

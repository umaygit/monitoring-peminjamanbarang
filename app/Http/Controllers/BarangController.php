<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }
    
    public function create() {
        return view('barangs.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ]);
        Barang::create($request->all());
        return redirect()->route('barangs.index');
    }
    
    public function edit(Barang $barang) {
        return view('barangs.edit', compact('barang'));
    }
    
    public function update(Request $request, Barang $barang) {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ]);
        $barang->update($request->all());
        return redirect()->route('barangs.index');
    }
    
    public function destroy(Barang $barang) {
        $barang->delete();
        return redirect()->route('barangs.index');
    }
}

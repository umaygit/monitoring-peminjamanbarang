<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('barang')->get();
        return view('peminjamans.index', compact('peminjamans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('peminjamans.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'keterangan' => 'nullable|string|max:100',
        ]);

        Peminjaman::create($request->all());
        return redirect()->route('peminjamans.index');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $barangs = Barang::all();
        return view('peminjamans.edit', compact('peminjaman', 'barangs'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'keterangan' => 'nullable|string|max:100'
        ]);

        $peminjaman->update($request->all());
        return redirect()->route('peminjamans.index');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjamans.index');
    }
}
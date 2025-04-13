@extends('layouts.app')

@section('content')
<div class="container text-black">
    <h1 class="text-2xl font-bold">Daftar Barang</h1>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">Tambah Barang</a>
    
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nama Barang</th>
                <th class="px-4 py-2">Tipe Barang</th>
                <th class="px-4 py-2">Jumlah</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
            <tr>
                <td class="border px-4 py-2">{{ $barang->id }}</td>
                <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                <td class="border px-4 py-2">{{ $barang->tipe_barang }}</td>
                <td class="border px-4 py-2">{{ $barang->jumlah }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('barangs.edit', $barang) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('barangs.destroy', $barang) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
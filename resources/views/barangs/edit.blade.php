@extends('layouts.app')

@section('content')
<div class="container text-black">
    <h1 class="text-2xl font-bold">Edit Barang</h1>
    <form action="{{ route('barangs.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <label for="nama_barang" class="block">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mt-4">
            <label for="nama_barang" class="block">Tipe Barang</label>
            <input type="text" id="tipe_barang" name="tipe_barang" value="{{ $barang->tipe_barang }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mt-4">
            <label for="jumlah" class="block">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ $barang->jumlah }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
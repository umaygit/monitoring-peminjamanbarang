@extends('layouts.app')

@section('content')
<div class="container text-black">
    <h1 class="text-2xl font-bold">Edit Peminjaman</h1>
    <form action="{{ route('peminjamans.update', $peminjaman) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <label for="nama_peminjam" class="block">Nama Peminjam</label>
            <input type="text" id="nama_peminjam" name="nama_peminjam" value="{{ $peminjaman->nama_peminjam }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mt-4">
            <label for="barang_id" class="block">Pilih Barang</label>
            <select id="barang_id" name="barang_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barang->id == $peminjaman->barang_id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label for="jumlah" class="block">Jumlah Barang</label>
            <input type="number" id="jumlah" name="jumlah" value="{{ $peminjaman->jumlah }}" class="mt-1 block w-full border-gray-300 rounded-md" min="1" required>
        </div>
        <div class="mt-4">
            <label for="tanggal_pinjam" class="block">Tanggal Pinjam</label>
            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mt-4">
            <label for="tanggal_kembali" class="block">Tanggal Kembali (Opsional)</label>
            <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('peminjamans.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection

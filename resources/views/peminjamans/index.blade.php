@extends('layouts.app')

@section('content')
<div class="container text-black">
    <h1 class="text-2xl font-bold">Daftar Peminjaman</h1>
    <a href="{{ route('peminjamans.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nama Peminjam</th>
                <th class="px-4 py-2">Barang</th>
                <th class="px-4 py-2">Jumlah</th>
                <th class="px-4 py-2">Keterangan</th>
                <th class="px-4 py-2">Tanggal Pinjam</th>
                <th class="px-4 py-2">Tanggal Kembali</th>
                <th class="px-4 py-2">Expired</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamans as $peminjaman)
            <tr>
                <td class="border px-4 py-2">{{ $peminjaman->id }}</td>
                <td class="border px-4 py-2">{{ $peminjaman->nama_peminjam }}</td>
                <td class="border px-4 py-2">{{ $peminjaman->barang->nama_barang }}</td>
                <td class="border px-4 py-2">{{ $peminjaman->jumlah }}</td>
                <td class="border px-4 py-2">{{ $peminjaman->keterangan ?? 'Tidak ada keterangan' }}</td>
                <td class="border px-4 py-2">{{ $peminjaman->tanggal_pinjam }}</td>
                <td class="border px-4 py-2">{{ $peminjaman->tanggal_kembali ?? 'Belum Kembali' }}</td>
                <td class="border px-4 py-2">
                    <div class="relative w-full h-2 bg-gray-200">
                        @php
                        $totalDays = \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->diffInDays($peminjaman->tanggal_kembali ?? now());
                        $elapsedDays = \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->diffInDays(now());
                        $progress = $totalDays > 0 ? ($elapsedDays / $totalDays) * 100 : 0; // Pastikan tidak ada pembagian dengan nol
                        @endphp
                        <div class="absolute top-0 left-0 h-2 bg-blue-500" style="width: {{ $progress }}%;"></div>
                    </div>
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('peminjamans.edit', $peminjaman) }}" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 4.379a3 3 0 00-4.242 0L3 12.121V21h8.879l6.879-6.879a3 3 0 000-4.242l-4.636-4.636z" /></svg>
                    </a>
                    <form action="{{ route('peminjamans.destroy', $peminjaman) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
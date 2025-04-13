@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Kartu Jumlah Barang -->
            <div class="bg-blue-500 dark:bg-blue-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 001-1V4a1 1 0 00-1-1H5z"/></svg>
                        Jumlah Barang
                    </h3>
                    <p class="text-2xl">{{ $jumlahBarang }}</p>
                </div>
            </div>

            <!-- Kartu Jumlah Peminjam -->
            <div class="bg-green-500 dark:bg-green-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z"/></svg>
                        Jumlah Peminjam
                    </h3>
                    <p class="text-2xl">{{ $jumlahPeminjam }}</p>
                </div>
            </div>

            <!-- Kartu Progres Masa Batas Peminjaman -->
            <div class="bg-purple-500 dark:bg-purple-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="text-lg font-bold flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z"/></svg>
                        Progres Masa Batas Peminjaman
                    </h3>
                    <p class="text-2xl">{{ number_format($progresMasaBatas, 2) }}%</p> <!-- Format angka dengan 2 desimal -->
                    <div class="mt-2 bg-gray-300 rounded-full h-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: {{ $progresMasaBatas }}%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Jumlah Barang yang Sudah Keluar dan Sisanya -->
        <div class="mt-6">
            <h2 class="text-xl font-bold">Detail Barang</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Keluar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sisa</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($barangs as $barang)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $barang->nama_barang }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $barang->total_keluar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $barang->jumlah - $barang->total_keluar }}</td> <!-- Menghitung sisa -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Peminjaman;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $jumlahBarang = Barang::count();
        // $jumlahPeminjam = Peminjaman::count();

        // // Hitung progres masa batas peminjaman
        // $totalPeminjaman = Peminjaman::count();
        // $peminjamanTepatWaktu = Peminjaman::where('tanggal_kembali', '>=', Carbon::now())->count();
        
        // // Menghindari pembagian dengan nol
        // $progresMasaBatas = $totalPeminjaman > 0 ? ($peminjamanTepatWaktu / $totalPeminjaman) * 100 : 0;

        // return view('dashboard', compact('jumlahBarang', 'jumlahPeminjam', 'progresMasaBatas'));

        $jumlahBarang = Barang::count();
        $jumlahPeminjam = Peminjaman::distinct('nama_peminjam')->count();
        
        // Menghitung progres masa batas peminjaman
        $totalPeminjaman = Peminjaman::count();
        $totalMasaBatas = Peminjaman::whereNotNull('tanggal_kembali')->count();
        
        // Pastikan tidak ada pembagian dengan nol
        $progresMasaBatas = $totalPeminjaman > 0 ? ($totalMasaBatas / $totalPeminjaman) * 100 : 0;

        // Mengambil data barang dan menghitung jumlah yang sudah keluar
        $barangs = Barang::withCount(['peminjamans as total_keluar' => function ($query) {
            $query->whereNotNull('tanggal_kembali'); // Hanya menghitung peminjaman yang sudah selesai
        }])->get();
        
        
        return view('dashboard', compact('jumlahBarang', 'jumlahPeminjam', 'progresMasaBatas', 'barangs'));
    }
}

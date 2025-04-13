<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['nama_peminjam', 'barang_id', 'jumlah', 'tanggal_pinjam', 'tanggal_kembali', 'keterangan'];

    // Definisikan relasi ke model Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
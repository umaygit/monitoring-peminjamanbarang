<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'tipe_barang', 'jumlah'];

    // Definisikan relasi ke model Peminjaman
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
    
}
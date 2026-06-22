<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'tgl_pengadaan',
        'harga_barang',
        'penanggung_jawab',
        'kondisi',
        'lokasi',
    ];
}
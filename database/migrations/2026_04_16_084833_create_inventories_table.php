<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('inventories', function (Blueprint $table) {
        $table->id();
        $table->string('kode_barang')->unique();
        $table->string('nama_barang');
        $table->string('kategori');
        $table->date('tgl_pengadaan');
        $table->decimal('harga_barang', 15, 2);
        $table->string('penanggung_jawab'); // Bisa diisi ID Pegawai nanti
        $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
        $table->string('lokasi');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};

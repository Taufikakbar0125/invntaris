<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date; // Tambahkan ini

class InventoryImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Inventory([
            'kode_barang'      => $row['kode_barang'],
            'nama_barang'      => $row['nama_barang'],
            'kategori'         => $row['kategori'],
            
            // Logika konversi tanggal Excel ke format Y-m-d
            'tgl_pengadaan'    => is_numeric($row['tgl_pengadaan']) 
                                    ? Date::excelToDateTimeObject($row['tgl_pengadaan'])->format('Y-m-d') 
                                    : $row['tgl_pengadaan'],
                                    
            'harga_barang'     => $row['harga_barang'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'kondisi'          => $row['kondisi'],
            'lokasi'           => $row['lokasi'],
        ]);
    }
}
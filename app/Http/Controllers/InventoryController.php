<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::query()
            ->select(
                'inventories.*',
                'employees.name as nama_karyawan'
            )
            ->leftJoin('employees', 'inventories.penanggung_jawab', '=', 'employees.employee_id');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('inventories.nama_barang', 'like', '%' . $request->search . '%')
                  ->orWhere('inventories.kode_barang', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('user_id')) {
            $query->where('inventories.penanggung_jawab', $request->user_id);
        }

        if ($request->filled('kondisi')) {
            $query->where('inventories.kondisi', $request->kondisi);
        }

        $items = $query->latest('inventories.created_at')->get();

        return view('home', compact('items'));
    }
}
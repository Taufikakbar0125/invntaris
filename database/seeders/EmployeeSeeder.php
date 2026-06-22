<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
    
            ['employee_id' => 'USR-001', 'name' => 'Ahmad Fauzi',      'jabatan' => 'Manager'],
            ['employee_id' => 'USR-002', 'name' => 'Siti Aminah',     'jabatan' => 'Sekretaris'],
            ['employee_id' => 'USR-003', 'name' => 'Budi Santoso',    'jabatan' => 'Supervisor'],
            ['employee_id' => 'USR-004', 'name' => 'Ratna Sari',      'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-005', 'name' => 'Eko Prasetyo',    'jabatan' => 'IT Support'],
            ['employee_id' => 'USR-006', 'name' => 'Maya Indah',      'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-007', 'name' => 'Dedi Kurniawan',  'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-008', 'name' => 'Lutfi Hakim',     'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-009', 'name' => 'Rudi Hartono',    'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-010', 'name' => 'Dewi Kusuma',     'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-011', 'name' => 'Agus Setiawan',   'jabatan' => 'IT Support'],
            ['employee_id' => 'USR-012', 'name' => 'Rina Marlina',    'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-013', 'name' => 'Hendra Wijaya',   'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-014', 'name' => 'Lina Susanti',    'jabatan' => 'Sekretaris'],
            ['employee_id' => 'USR-015', 'name' => 'Fajar Nugroho',   'jabatan' => 'Supervisor'],
            ['employee_id' => 'USR-016', 'name' => 'Yuni Astuti',     'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-017', 'name' => 'Bagus Santoso',   'jabatan' => 'Manager'],
            ['employee_id' => 'USR-018', 'name' => 'Citra Dewi',      'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-019', 'name' => 'Irfan Maulana',   'jabatan' => 'IT Support'],
            ['employee_id' => 'USR-020', 'name' => 'Nadia Putri',     'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-021', 'name' => 'Wahyu Prasetya',  'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-022', 'name' => 'Sari Indah',      'jabatan' => 'Sekretaris'],
            ['employee_id' => 'USR-023', 'name' => 'Doni Firmansyah', 'jabatan' => 'Supervisor'],
            ['employee_id' => 'USR-024', 'name' => 'Mega Lestari',    'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-025', 'name' => 'Rizky Ramadhan',  'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-026', 'name' => 'Anisa Rahayu',    'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-027', 'name' => 'Bima Sakti',      'jabatan' => 'IT Support'],
            ['employee_id' => 'USR-028', 'name' => 'Putri Anggraini', 'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-029', 'name' => 'Galih Permana',   'jabatan' => 'Supervisor'],
            ['employee_id' => 'USR-030', 'name' => 'Rini Wulandari',  'jabatan' => 'Sekretaris'],
            ['employee_id' => 'USR-031', 'name' => 'Tono Supriyadi',  'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-032', 'name' => 'Vera Handayani',  'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-033', 'name' => 'Dimas Prayoga',   'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-034', 'name' => 'Ayu Fitriani',    'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-035', 'name' => 'Haris Kusuma',    'jabatan' => 'Manager'],
            ['employee_id' => 'USR-036', 'name' => 'Nita Permatasari', 'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-037', 'name' => 'Yusuf Hidayat',   'jabatan' => 'IT Support'],
            ['employee_id' => 'USR-038', 'name' => 'Eka Safitri',     'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-039', 'name' => 'Arif Rahman',     'jabatan' => 'Supervisor'],
            ['employee_id' => 'USR-040', 'name' => 'Dwi Lestari',     'jabatan' => 'Sekretaris'],
            ['employee_id' => 'USR-041', 'name' => 'Sigit Pratama',   'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-042', 'name' => 'Mia Rahayu',      'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-043', 'name' => 'Taufik Ismail',   'jabatan' => 'Staff Admin'],
            ['employee_id' => 'USR-044', 'name' => 'Fika Amelia',     'jabatan' => 'Accounting'],
            ['employee_id' => 'USR-045', 'name' => 'Hendri Saputra',  'jabatan' => 'IT Support'],
            ['employee_id' => 'USR-046', 'name' => 'Winda Sari',      'jabatan' => 'Supervisor'],
            ['employee_id' => 'USR-047', 'name' => 'Bayu Nugroho',    'jabatan' => 'Staff Gudang'],
            ['employee_id' => 'USR-048', 'name' => 'Lilis Suryani',   'jabatan' => 'Sekretaris'],
            ['employee_id' => 'USR-049', 'name' => 'Andi Kristiawan', 'jabatan' => 'Staff IT'],
            ['employee_id' => 'USR-050', 'name' => 'Novi Anggraini',  'jabatan' => 'Staff Admin'],
        ];

        $now = Carbon::now();

        foreach ($employees as $emp) {
            Employee::create([
                'employee_id' => $emp['employee_id'],
                'name'        => $emp['name'],
                'jabatan'     => $emp['jabatan'],
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }
    }
}
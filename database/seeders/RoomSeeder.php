<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            'Ruangan 1',
            'Ruangan 2',
            'Ruangan 3',
            'Ruangan Front Office',
            'Administrasi',
            'Gudang',
            'Ruang Server',
            'Ruang Rapat',
            'Dapur',
            'Garasi',
        ];

        foreach ($rooms as $name) {
            Room::create(['name' => $name]);
        }
    }
}
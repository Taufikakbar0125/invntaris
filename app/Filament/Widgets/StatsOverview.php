<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Inventory;
use App\Models\Employee;
use App\Models\Room;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Barang', Inventory::count())
                ->description('Semua aset terdaftar')
                ->icon('heroicon-o-archive-box')
                ->color('primary'),

            Stat::make('Total Pegawai', Employee::count())
                ->description('Pegawai terdaftar')
                ->icon('heroicon-o-users')
                ->color('info'),

            Stat::make('Total Ruangan', Room::count())
                ->description('Ruangan terdaftar')
                ->icon('heroicon-o-building-office')
                ->color('warning'),
        ];
    }
}
<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Inventory;

class KondisiStats extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Kondisi Baik', Inventory::where('kondisi', 'Baik')->count())
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Rusak Ringan', Inventory::where('kondisi', 'Rusak Ringan')->count())
                ->icon('heroicon-o-exclamation-triangle')
                ->color('warning'),

            Stat::make('Rusak Berat', Inventory::where('kondisi', 'Rusak Berat')->count())
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
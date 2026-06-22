<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Inventory;

class KategoriChart extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $data = Inventory::selectRaw('kategori, count(*) as total')
            ->groupBy('kategori')
            ->orderByDesc('total')
            ->pluck('total', 'kategori')
            ->toArray();

        $totalAll = array_sum($data);

        return collect($data)->map(function ($total, $kategori) use ($totalAll) {
            $persen = $totalAll > 0 ? round(($total / $totalAll) * 100) : 0;
            return Stat::make($kategori, $total . ' barang')
                ->description($persen . '% dari total inventaris')
                ->icon('heroicon-o-tag')
                ->color('primary');
        })->values()->toArray();
    }
}
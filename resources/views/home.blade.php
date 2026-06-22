<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sistem Inventaris Kantor</title>

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#2563eb">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 antialiased">

    <div class="max-w-7xl mx-auto px-3 sm:px-6">

        <div class="filter-wrapper">
            <header class="py-3 text-center mobile-header">
                <h1 class="text-lg sm:text-3xl font-extrabold text-slate-800 tracking-tight">SISTEM INVENTARIS</h1>
                <p class="text-slate-400 text-[10px] sm:text-sm uppercase tracking-widest hidden sm:block">Monitoring Aset Universitas Gunung Kidul</p>
            </header>

            <section class="filter-card p-3 mb-4">
                <form action="/" method="GET" id="filterForm" class="grid grid-cols-2 md:grid-cols-4 gap-2 items-end">
                    <div class="input-group col-span-2 md:col-span-1">
                        <label>Cari Barang</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama / Kode...">
                    </div>
                    <div class="input-group">
                        <label>PJ (ID)</label>
                        <input type="text" name="user_id" value="{{ request('user_id') }}" placeholder="ID...">
                    </div>
                    <div class="input-group">
                        <label>Kondisi</label>
                        <select name="kondisi">
                            <option value="">Semua</option>
                            <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                            <option value="Rusak Ringan" {{ request('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="Rusak Berat" {{ request('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                    </div>
                    <div class="flex gap-2 col-span-2 md:col-span-1">
                        <button type="submit" class="btn-primary flex-1">Filter</button>
                        <a href="/" class="btn-secondary">Reset</a>
                    </div>
                </form>
            </section>
        </div>

        <div class="table-wrapper mb-8">
            <table class="mobile-optimized">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th style="text-align: center;">PJ / Karyawan</th>
                        <th>Lokasi</th>
                        <th style="text-align: center;">Kondisi</th>
                        <th style="text-align: right;">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td data-label="Kode" class="font-mono font-bold text-blue-600 cell-kode">{{ $item->kode_barang }}</td>
                        <td data-label="Barang" class="font-semibold text-slate-700 cell-nama">{{ $item->nama_barang }}</td>
                        <td data-label="PJ / Karyawan" class="text-center">
                            <div class="pj-label">
                                <span class="pj-id">{{ $item->penanggung_jawab }}</span>
                                <span class="pj-name">{{ $item->nama_karyawan }}</span>
                            </div>
                        </td>
                        <td data-label="Lokasi" class="text-slate-500">{{ $item->lokasi }}</td>
                        <td data-label="Kondisi" class="text-center">
                            <span class="badge-status {{ Str::slug($item->kondisi) }}">
                                {{ $item->kondisi }}
                            </span>
                        </td>
                        <td data-label="Harga" class="text-right font-mono font-bold text-slate-800 cell-harga">
                            Rp {{ number_format($item->harga_barang, 0, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-16 text-center text-slate-400 italic">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <footer class="pb-8 text-center text-slate-400 text-[10px] uppercase tracking-widest">
            Total: <span class="text-slate-600 font-bold">{{ $items->count() }} Unit</span>
        </footer>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>

   <script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js?v=2') // Tambahkan ?v=2 untuk paksa update
                .then(reg => {
                    reg.update(); // Paksa update service worker
                    console.log('PWA Ready!');
                });
        });
    }
</script>
</body>
</html>
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Models\Inventory;
use App\Models\Employee;
use App\Models\Room;
use App\Imports\InventoryImport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Maatwebsite\Excel\Facades\Excel;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Notifications\Notification;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    
    protected static ?string $navigationLabel = 'Inventaris Kantor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Utama')
                    ->description('Detail identitas barang inventaris')
                    ->schema([
                        Forms\Components\TextInput::make('kode_barang')
                            ->label('Kode Barang')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('nama_barang')
                            ->label('Nama Barang')
                            ->required(),
                        Forms\Components\Select::make('kategori')
                            ->options([
                                'Elektronik' => 'Elektronik',
                                'Furniture' => 'Furniture',
                                'Kendaraan' => 'Kendaraan',
                                'ATK' => 'Alat Tulis Kantor',
                            ])->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Detail Pengadaan & Status')
                    ->schema([
                        Forms\Components\DatePicker::make('tgl_pengadaan')
                            ->label('Tanggal Beli')
                            ->required(),
                        Forms\Components\TextInput::make('harga_barang')
                            ->label('Harga Perolehan')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),
                        
                        Forms\Components\Select::make('penanggung_jawab')
                            ->label('Penanggung Jawab')
                            ->options(Employee::all()->pluck('name', 'employee_id'))
                            ->searchable()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('employee_id')->required()->label('ID Karyawan'),
                                Forms\Components\TextInput::make('name')->required()->label('Nama Lengkap'),
                            ])
                            ->createOptionUsing(fn (array $data) => Employee::create($data)->employee_id),

                        Forms\Components\Select::make('kondisi')
                            ->options([
                                'Baik' => 'Baik',
                                'Rusak Ringan' => 'Rusak Ringan',
                                'Rusak Berat' => 'Rusak Berat',
                            ])->required(),

                        Forms\Components\Select::make('lokasi')
                            ->label('Posisi/Ruangan')
                            ->options(Room::all()->pluck('name', 'name'))
                            ->searchable()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')->required()->label('Nama Ruangan Baru'),
                            ])
                            ->createOptionUsing(fn (array $data) => Room::create($data)->name),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                // TOMBOL IMPORT EXCEL DI ATAS TABEL
                Action::make('importExcel')
                    ->label('Import Excel')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih File Excel (.xlsx)')
                            ->required()
                            ->disk('public')
                            ->directory('temp-imports'),
                    ])
                    ->action(function (array $data) {
                        try {
                            $path = storage_path('app/public/' . $data['file']);
                            Excel::import(new InventoryImport, $path);
                            
                            Notification::make()
                                ->title('Berhasil mengimport data')
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('Gagal mengimport data: ' . $e->getMessage())
                                ->danger()
                                ->send();
                        }
                    })
            ])
            ->columns([
                Tables\Columns\TextColumn::make('kode_barang')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama_barang')->searchable(),
                Tables\Columns\TextColumn::make('kategori')->badge(),
                Tables\Columns\TextColumn::make('harga_barang')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('penanggung_jawab')->label('PJ'),
                Tables\Columns\TextColumn::make('kondisi')
                    ->color(fn (string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Rusak Ringan' => 'warning',
                        'Rusak Berat' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('lokasi'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kategori'),
                Tables\Filters\SelectFilter::make('kondisi'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // TOMBOL EXPORT EXCEL (Centang data dulu baru muncul)
                    ExportBulkAction::make()
                        ->label('Download Excel Terpilih'),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }
}
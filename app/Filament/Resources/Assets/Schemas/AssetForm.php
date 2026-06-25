<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')
                ->required()
                ->label('Nama Barang'),

            Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->label('Kategori'),

            Select::make('vendor_id')
                ->relationship('vendor', 'company_name')
                ->required()
                ->label('Vendor'),

            DatePicker::make('purchase_date')
                ->required()
                ->label('Tanggal Beli'),

            TextInput::make('price')
                ->numeric()
                ->required()
                ->label('Harga'),

            FileUpload::make('photo')
                ->image()
                ->disk('public')
                ->directory('assets')
                ->label('Foto'),

            Select::make('condition')
                ->options([
                    'Baik' => 'Baik',
                    'Rusak' => 'Rusak',
                    'Hilang' => 'Hilang',
                ])
                ->required()
                ->label('Kondisi'),
        ]);
    }
}

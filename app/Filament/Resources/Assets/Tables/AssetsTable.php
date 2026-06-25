<?php

namespace App\Filament\Resources\Assets\Tables;


use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AssetsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->disk('public')
                    ->circular()
                    ->label('Foto'),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori'),

                TextColumn::make('price')
                    ->money('IDR', locale: 'id'),

                BadgeColumn::make('condition')
                    ->colors([
                        'success' => 'Baik',
                        'danger' => 'Rusak',
                        'warning' => 'Hilang',
                    ]),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),

                SelectFilter::make('condition')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak' => 'Rusak',
                        'Hilang' => 'Hilang',
                    ]),
            ]);
    }
}
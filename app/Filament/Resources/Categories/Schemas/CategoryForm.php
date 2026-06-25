<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')
                ->required()
                ->unique(ignoreRecord: true)
                ->label('Nama Kategori'),

            Toggle::make('is_depreciated')
                ->label('Menyusut Nilainya?'),
        ]);
    }
}

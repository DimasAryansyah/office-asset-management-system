<?php

namespace App\Filament\Resources\Vendors\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VendorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('company_name')
                ->required()
                ->label('Nama Perusahaan'),

            TextInput::make('contact_person')
                ->required()
                ->label('Contact Person'),

            TextInput::make('phone')
                ->numeric()
                ->required()
                ->label('No Telepon'),

            Textarea::make('address')
                ->required()
                ->label('Alamat'),
        ]);
    }
}
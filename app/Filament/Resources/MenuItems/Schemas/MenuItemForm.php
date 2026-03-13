<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('menu_id')
                    ->label('Menu')
                    ->relationship('menu', 'name')
                    ->required(),

                TextInput::make('title')
                    ->required(),

                TextInput::make('url')
                    ->required(),

                Select::make('parent_id')
                    ->label('Parent Menu')
                    ->options(\App\Models\MenuItem::pluck('title','id'))
                    ->searchable()
                    ->nullable(),

                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
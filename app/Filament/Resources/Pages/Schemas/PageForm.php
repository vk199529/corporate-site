<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->required(),

                Select::make('template')
                    ->options([
                        'default' => 'Default Page',
                        'about' => 'About Page',
                        'services' => 'Services Page',
                    ])
                    ->default('default')
                    ->required(),

                RichEditor::make('content')
                    ->columnSpanFull(),

            ]);
    }
}
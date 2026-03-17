<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\MarkdownEditor;


use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Page Information')
                    ->schema([

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
                                'home'   => 'Home Page',
                                'about' => 'About Page',
                                'services' => 'Services Page',
                            ])
                            ->default('default')
                            ->required(),

                        MarkdownEditor::make('content')
                            ->columnSpanFull(),

                    ])
                    ->columns(2),


                Section::make('SEO Settings')
                    ->description('Search engine optimization settings for this page')
                    ->schema([

                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->placeholder('Enter SEO meta title'),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->placeholder('Enter SEO meta description'),

                    ])
                    ->collapsible()

            ]);
    }
}
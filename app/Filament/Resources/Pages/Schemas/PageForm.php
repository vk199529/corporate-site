<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Tabs;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Tabs::make('Page Builder')
                    ->tabs([

                        /*
                        |-----------------------------------------
                        | TAB 1: GENERAL
                        |-----------------------------------------
                        */
                        Tabs\Tab::make('General')
                            ->icon('heroicon-o-document-text')
                            ->schema([

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
                                'make-a-payment' => 'Make A Payment Page',
                                'careers' => 'Careers Page',
                                'contact' => 'Contact Page',
                                'service-detail' => 'Service Detail Page',
                                'corporate-responsibility' => 'Corporate Responsibility Page',
                            ])
                                            ->default('home')
                                            ->required()
                                            ->live(),

                                    ])
                                    ->columns(2),

                            ]),

                        /*
                        |-----------------------------------------
                        | TAB 2: CONTENT
                        |-----------------------------------------
                        */
                        Tabs\Tab::make('Content')
                            ->icon('heroicon-o-squares-2x2')
                            ->schema([

                                Builder::make('content')
                                    ->label('Page Sections')
                                    ->collapsed()
                                    ->visible(fn ($get) => $get('template') === 'home')
                                    ->blocks([

                                        /*
                                        |-----------------------------------------
                                        | VIDEO SECTION
                                        |-----------------------------------------
                                        */
                                        Builder\Block::make('video')
                                            ->label('🎥 Hero Video')
                                            ->icon('heroicon-o-video-camera')
                                            ->schema([

                                                Section::make('Video Settings')
                                                    ->schema([

                                                        FileUpload::make('video')
                                                            ->label('Upload Video')
                                                            ->disk('public') // ✅ IMPORTANT
                                                            ->directory('videos')
                                                            ->acceptedFileTypes(['video/mp4'])
                                                            ->maxSize(51200)
                                                            ->required(),

                                                    ])

                                            ]),

                                        /*
                                        |-----------------------------------------
                                        | WHAT WE DO
                                        |-----------------------------------------
                                        */
                                        Builder\Block::make('what_we_do')
                                            ->label('🧩 What We Do')
                                            ->icon('heroicon-o-briefcase')
                                            ->schema([

                                                Section::make('Section Content')
                                                    ->schema([

                                                        TextInput::make('subtitle')
                                                            ->placeholder('WHAT WE DO'),

                                                        TextInput::make('title')
                                                            ->required(),

                                                        Textarea::make('description')
                                                            ->rows(3),

                                                    ]),

                                                Section::make('Services')
                                                    ->description('Add your services')
                                                    ->schema([

                                                        Repeater::make('items')
                                                            ->label('Service Items')
                                                            ->grid(2)
                                                            ->itemLabel(fn ($state) => $state['title'] ?? 'Service')
                                                            ->schema([

                                                                FileUpload::make('image')
                                                                    ->image()
                                                                    ->disk('public') // ✅ IMPORTANT
                                                                    ->directory('services')
                                                                    ->imagePreviewHeight('100'),

                                                                TextInput::make('title')
                                                                    ->required(),

                                                                Textarea::make('description')
                                                                    ->rows(2),

                                                                TextInput::make('link')
                                                                    ->placeholder('/service-link'),

                                                            ])
                                                            ->collapsible()
                                                            ->cloneable()
                                                            ->reorderable()
                                                            ->minItems(1),

                                                    ])

                                            ]),

                                    ])
                                    ->columnSpanFull(),

                            ]),

                        /*
                        |-----------------------------------------
                        | TAB 3: SEO
                        |-----------------------------------------
                        */
                        Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-magnifying-glass')
                            ->schema([

                                Section::make('SEO Settings')
                                    ->description('Optimize your page for search engines')
                                    ->schema([

                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(255),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(3),

                                    ]),

                            ]),

                    ])
                      ->columnSpanFull()
            ]);
    }
}
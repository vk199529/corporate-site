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
                                'thank-you' => 'Thanku Pge',
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
                                    ->blocks([

                                    // ✅ HERO (ADD HERE - TOP)
        Builder\Block::make('hero')
            ->label('🖼️ Hero Banner')
            ->icon('heroicon-o-photo')
            ->schema([

                Section::make('Hero Content')
                    ->schema([

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('hero')
                            ->required(),

                        TextInput::make('title')
                            ->required(),

                        TextInput::make('subtitle'),

                        TextInput::make('button_text'),

                        TextInput::make('button_link'),

                    ])
            ]),


                                        /*
                                        |-----------------------------------------
                                        | VIDEO SECTION
                                        |-----------------------------------------
                                        */
                                        Builder\Block::make('video')
                                            ->visible(fn ($livewire) => $livewire->data['template'] === 'home')
                                            ->label('🎥 Hero Video')
                                            ->icon('heroicon-o-video-camera')
                                            ->schema([

                                                Section::make('Video Settings')
                                                    ->schema([

                                                        FileUpload::make('video')
                                                            ->label('Upload Video')
                                                            ->disk('public')
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
                                            ->visible(fn ($livewire) => $livewire->data['template'] === 'home')
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
                                                                    ->disk('public') 
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


                                             /*
                                        |-----------------------------------------
                                        | WHO WE SERVE
                                        |-----------------------------------------
                                        */
                                       Builder\Block::make('who_we_serve')
                                       ->visible(fn ($livewire) => $livewire->data['template'] === 'home')
                                         ->label('👥 Who We Serve') 
                                       ->icon('heroicon-o-users')
                                     ->schema([

        /*
        |-----------------------------------------
        | SECTION CONTENT
        |-----------------------------------------
        */
        Section::make('Section Content')
            ->schema([

                TextInput::make('subtitle')
                    ->placeholder('WHO WE SERVE'),

                TextInput::make('title')
                    ->required(),

                Textarea::make('description')
                    ->rows(3),

            ]),

        /*
        |-----------------------------------------
        | CARDS / ITEMS
        |-----------------------------------------
        */
        Section::make('Serve Categories')
            ->description('Add cards like Retail, Financial Services etc.')
            ->schema([

                Repeater::make('items')
                    ->label('Cards')
                    ->grid(2) 
                    ->itemLabel(fn ($state) => $state['title'] ?? 'Card')
                    ->schema([

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('who-we-serve')
                            ->imagePreviewHeight('120')
                            ->required(),

                        TextInput::make('title')
                            ->required()
                            ->placeholder('e.g. Retail & Distributors'),

                            Textarea::make('description')
                            ->rows(2),

                    ])
                    ->collapsible()
                    ->cloneable()
                    ->reorderable()
                    ->minItems(1)
                    ->defaultItems(4), // 🔥 auto 4 cards

            ])

    ])
    ->columns(1)

                                    ])
                                    ->columnSpanFull(),
                                    

                                    

  /*
|-----------------------------------------
| TEAM SECTION (ABOUT PAGE)
|-----------------------------------------
*/

                                     Builder::make('content')
                                    ->label('Page Sections')
                                    ->collapsed()
                                    ->visible(fn ($get) => $get('template') === 'about')
                                    ->blocks([
Builder\Block::make('team')
    ->label('👨‍💼 Team Members')
    ->icon('heroicon-o-user-group')
    ->schema([

        Section::make('Section Heading')
            ->schema([

                TextInput::make('subtitle')
                    ->placeholder('MEET CRICHTONMULLINGS & ASSOCIATES'),

                TextInput::make('title')
                    ->required(),

                Textarea::make('description')
                    ->rows(3),

            ]),

        Section::make('Team Members')
            ->schema([

                Repeater::make('members')
                    ->label('Team Members')
                    ->grid(3)
                    ->itemLabel(fn ($state) => $state['name'] ?? 'Member')
                    ->schema([

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('team')
                            ->required(),

                        TextInput::make('name')
                            ->required(),

                        TextInput::make('designation')
                            ->placeholder('CPA, CA'),

                        Textarea::make('bio')
                            ->rows(3),

                    ])
                    ->collapsible()
                    ->cloneable()
                    ->reorderable()
                    ->minItems(3)
                    ->defaultItems(6),

            ])

    ])
                                    ]),

/*
 |-----------------------------------------
| TEAM SECTION (services PAGE)
|-----------------------------------------
*/


                                     Builder::make('content')
                                    ->label('Page Sections')
                                    ->collapsed()
                                    ->visible(fn ($get) => $get('template') === 'services')
                                    ->blocks([
Builder\Block::make('services')
    ->label('👨‍💼Full Services')
    ->icon('heroicon-o-user-group')
    ->schema([

        Section::make('Section Heading')
            ->schema([

                TextInput::make('subtitle')
                    ->placeholder('FULL SUITE OF SERVICES'),

                TextInput::make('title')
                    ->required(),

                Textarea::make('description')
                    ->rows(3),

            ]),

        Section::make('Team Members')
            ->schema([

                Repeater::make('members')
                    ->label('Team Members')
                    ->grid(2)
                    ->itemLabel(fn ($state) => $state['name'] ?? 'Member')
                    ->schema([

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('team')
                            ->required(),

                        TextInput::make('name')
                            ->required(),

                        TextInput::make('designation')
                            ->placeholder('CPA, CA'),

                        Textarea::make('bio')
                            ->rows(3),

                            TextInput::make('link')
                                 ->placeholder('/service-link'),

                    ])
                    ->collapsible()
                    ->cloneable()
                    ->reorderable()
                    ->minItems(3)
                     ->defaultItems(2),

            ])

    ])
                                    ])

                                    

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
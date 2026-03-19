<?php

namespace App\Filament\Resources\CricJobs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Str;

class CricJobForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

               
                Section::make('Job Information')
                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            ),

                        TextInput::make('slug')
                            ->required(),

                    ])
                    ->columns(2),

                // 📅 PUBLISH SETTINGS
                Section::make('Publish Settings')
                    ->schema([

                        Toggle::make('status')
                            ->label('Publish')
                            ->default(false),

                        DateTimePicker::make('published_at')
                            ->label('Publish Date'),

                    ])
                    ->columns(2),

                    
                // 📝 JOB CONTENT
                Section::make('Job Content')
                    ->schema([

                        RichEditor::make('content')
                            ->label('Job Description')
                            ->columnSpanFull(),

                    ]),

                    
                // 🔍 SEO SETTINGS
                Section::make('SEO Settings')
                    ->description('Search engine optimization settings')
                    ->schema([

                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3),

                    ])
                    ->collapsible(),

            ]);
    }
}
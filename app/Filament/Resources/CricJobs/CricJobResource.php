<?php

namespace App\Filament\Resources\CricJobs;

use App\Filament\Resources\CricJobs\Pages\CreateCricJob;
use App\Filament\Resources\CricJobs\Pages\EditCricJob;
use App\Filament\Resources\CricJobs\Pages\ListCricJobs;
use App\Filament\Resources\CricJobs\Schemas\CricJobForm;
use App\Filament\Resources\CricJobs\Tables\CricJobsTable;
use App\Models\CricJob;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CricJobResource extends Resource
{
    protected static ?string $model = CricJob::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CricJobForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CricJobsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCricJobs::route('/'),
            'create' => CreateCricJob::route('/create'),
            'edit' => EditCricJob::route('/{record}/edit'),
        ];
    }
}

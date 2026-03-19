<?php

namespace App\Filament\Resources\CricJobs\Pages;

use App\Filament\Resources\CricJobs\CricJobResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCricJobs extends ListRecords
{
    protected static string $resource = CricJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\CricJobs\Pages;

use App\Filament\Resources\CricJobs\CricJobResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCricJob extends EditRecord
{
    protected static string $resource = CricJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

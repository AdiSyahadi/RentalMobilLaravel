<?php

namespace App\Filament\Resources\DataMobilResource\Pages;

use App\Filament\Resources\DataMobilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataMobils extends ListRecords
{
    protected static string $resource = DataMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DataSewaResource\Pages;

use App\Filament\Resources\DataSewaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataSewas extends ListRecords
{
    protected static string $resource = DataSewaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

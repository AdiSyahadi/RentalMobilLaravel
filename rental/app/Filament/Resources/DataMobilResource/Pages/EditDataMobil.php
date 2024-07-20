<?php

namespace App\Filament\Resources\DataMobilResource\Pages;

use App\Filament\Resources\DataMobilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataMobil extends EditRecord
{
    protected static string $resource = DataMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

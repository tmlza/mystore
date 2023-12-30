<?php

namespace App\Filament\Resources\ContainerTestResource\Pages;

use App\Filament\Resources\ContainerTestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContainerTest extends EditRecord
{
    protected static string $resource = ContainerTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

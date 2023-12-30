<?php

namespace App\Filament\Resources\ContainerTestResource\Pages;

use App\Filament\Resources\ContainerTestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContainerTests extends ListRecords
{
    protected static string $resource = ContainerTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

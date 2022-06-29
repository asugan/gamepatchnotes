<?php

namespace App\Filament\Resources\PatchnotesResource\Pages;

use App\Filament\Resources\PatchnotesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatchnotes extends ListRecords
{
    protected static string $resource = PatchnotesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

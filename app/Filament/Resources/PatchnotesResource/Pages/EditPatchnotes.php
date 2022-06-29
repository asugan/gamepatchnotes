<?php

namespace App\Filament\Resources\PatchnotesResource\Pages;

use App\Filament\Resources\PatchnotesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatchnotes extends EditRecord
{
    protected static string $resource = PatchnotesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

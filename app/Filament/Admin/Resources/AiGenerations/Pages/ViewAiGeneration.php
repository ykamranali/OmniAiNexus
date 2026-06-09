<?php

namespace App\Filament\Admin\Resources\AiGenerations\Pages;

use App\Filament\Admin\Resources\AiGenerations\AiGenerationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAiGeneration extends ViewRecord
{
    protected static string $resource = AiGenerationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

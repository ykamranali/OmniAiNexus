<?php

namespace App\Filament\Admin\Resources\AiGenerations\Pages;

use App\Filament\Admin\Resources\AiGenerations\AiGenerationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAiGeneration extends EditRecord
{
    protected static string $resource = AiGenerationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

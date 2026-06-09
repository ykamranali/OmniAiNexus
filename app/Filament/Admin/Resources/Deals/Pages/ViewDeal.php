<?php

namespace App\Filament\Admin\Resources\Deals\Pages;

use App\Filament\Admin\Resources\Deals\DealResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDeal extends ViewRecord
{
    protected static string $resource = DealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

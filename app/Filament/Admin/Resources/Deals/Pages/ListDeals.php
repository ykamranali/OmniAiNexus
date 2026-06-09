<?php

namespace App\Filament\Admin\Resources\Deals\Pages;

use App\Filament\Admin\Resources\Deals\DealResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDeals extends ListRecords
{
    protected static string $resource = DealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

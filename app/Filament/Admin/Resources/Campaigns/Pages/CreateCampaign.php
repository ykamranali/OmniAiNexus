<?php

namespace App\Filament\Admin\Resources\Campaigns\Pages;

use App\Filament\Admin\Resources\Campaigns\CampaignResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCampaign extends CreateRecord
{
    protected static string $resource =
        CampaignResource::class;

    protected function mutateFormDataBeforeCreate(
        array $data
    ): array {
        $data['organization_id'] =
            auth()->user()->organization_id;

        return $data;
    }
}

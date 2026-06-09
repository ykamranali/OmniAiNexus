<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Pages;

use App\Filament\Admin\Resources\SocialAccounts\SocialAccountResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialAccount extends CreateRecord
{
    protected static string $resource = SocialAccountResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['organization_id'] =
            auth()->user()->organization_id;

        return $data;
    }
}

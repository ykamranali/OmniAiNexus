<?php

namespace App\Filament\Admin\Resources\SocialPosts\Pages;

use App\Filament\Admin\Resources\SocialPosts\SocialPostResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialPost extends CreateRecord
{
    protected static string $resource = SocialPostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['organization_id'] =
            auth()->user()->organization_id;

        return $data;
    }
}

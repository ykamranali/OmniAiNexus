<?php

namespace App\Filament\Admin\Resources\SocialPosts\Pages;

use App\Filament\Admin\Resources\SocialPosts\SocialPostResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSocialPost extends ViewRecord
{
    protected static string $resource = SocialPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

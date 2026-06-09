<?php

namespace App\Filament\Admin\Resources\SocialPosts\Pages;

use App\Filament\Admin\Resources\SocialPosts\SocialPostResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSocialPost extends EditRecord
{
    protected static string $resource = SocialPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

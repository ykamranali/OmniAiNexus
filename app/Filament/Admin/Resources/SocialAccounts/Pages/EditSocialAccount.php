<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Pages;

use App\Filament\Admin\Resources\SocialAccounts\SocialAccountResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSocialAccount extends EditRecord
{
    protected static string $resource = SocialAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

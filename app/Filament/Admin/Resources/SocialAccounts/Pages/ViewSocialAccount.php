<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Pages;

use App\Filament\Admin\Resources\SocialAccounts\SocialAccountResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSocialAccount extends ViewRecord
{
    protected static string $resource = SocialAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

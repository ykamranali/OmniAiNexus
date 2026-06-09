<?php

namespace App\Filament\Admin\Resources\SocialPosts\Pages;

use App\Filament\Admin\Resources\SocialPosts\SocialPostResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSocialPosts extends ListRecords
{
    protected static string $resource = SocialPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

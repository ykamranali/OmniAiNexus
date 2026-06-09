<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SocialAccountInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('organization.name')
                    ->label('Organization'),
                TextEntry::make('platform'),
                TextEntry::make('account_name'),
                TextEntry::make('account_id')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

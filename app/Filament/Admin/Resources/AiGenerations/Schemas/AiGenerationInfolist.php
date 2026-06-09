<?php

namespace App\Filament\Admin\Resources\AiGenerations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AiGenerationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('organization.name')
                    ->label('Organization'),
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('provider'),
                TextEntry::make('model'),
                TextEntry::make('type'),
                TextEntry::make('prompt')
                    ->columnSpanFull(),
                TextEntry::make('response')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tokens_used')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

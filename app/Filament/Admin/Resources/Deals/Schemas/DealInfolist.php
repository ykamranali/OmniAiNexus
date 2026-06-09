<?php

namespace App\Filament\Admin\Resources\Deals\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DealInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('organization.name')
                    ->label('Organization')
                    ->placeholder('-'),
                TextEntry::make('lead.name')
                    ->label('Lead')
                    ->placeholder('-'),
                TextEntry::make('title'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('stage')
                    ->badge(),
                TextEntry::make('expected_close_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

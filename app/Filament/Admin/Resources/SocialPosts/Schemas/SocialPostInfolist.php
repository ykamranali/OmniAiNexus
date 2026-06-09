<?php

namespace App\Filament\Admin\Resources\SocialPosts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SocialPostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}

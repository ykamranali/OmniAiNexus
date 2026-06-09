<?php

namespace App\Filament\Admin\Resources\AiGenerations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AiGenerationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('organization_id')
                    ->relationship('organization', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('provider')
                    ->required(),
                TextInput::make('model')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                Textarea::make('prompt')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('response')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('tokens_used')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}

<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SocialAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Hidden::make('organization_id')
                    ->default(fn () => auth()->user()->organization_id),

                Select::make('platform')
                    ->options([
                        'Instagram' => 'Instagram',
                        'Facebook' => 'Facebook',
                        'LinkedIn' => 'LinkedIn',
                        'TikTok' => 'TikTok',
                        'YouTube' => 'YouTube',
                        'X/Twitter' => 'X/Twitter',
                    ])
                    ->searchable()
                    ->required(),

                TextInput::make('account_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('account_id')
                    ->maxLength(255),

                Select::make('status')
                    ->options([
                        'Connected' => 'Connected',
                        'Disconnected' => 'Disconnected',
                        'Expired' => 'Expired',
                    ])
                    ->default('Disconnected')
                    ->required(),

            ]);
    }
}

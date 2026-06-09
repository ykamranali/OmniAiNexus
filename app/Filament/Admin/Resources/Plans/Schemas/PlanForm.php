<?php

namespace App\Filament\Admin\Resources\Plans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('monthly_price')
                    ->label('Monthly Price (AED)')
                    ->numeric()
                    ->required(),

                TextInput::make('trial_days')
                    ->label('Trial Days')
                    ->numeric()
                    ->default(15),

                TextInput::make('max_users')
                    ->label('Maximum Users')
                    ->numeric()
                    ->required(),

                TextInput::make('max_leads')
                    ->label('Maximum Leads')
                    ->numeric()
                    ->required(),

                TextInput::make('max_deals')
                    ->label('Maximum Deals')
                    ->numeric()
                    ->required(),

                TextInput::make('max_tasks')
                    ->label('Maximum Tasks')
                    ->numeric()
                    ->required(),

                TextInput::make('max_social_accounts')
                    ->label('Maximum Social Accounts')
                    ->numeric()
                    ->required(),

                TextInput::make('max_ai_tokens')
                    ->label('Maximum AI Tokens')
                    ->numeric()
                    ->required(),

                TextInput::make('max_ai_requests')
                    ->label('Maximum AI Requests')
                    ->numeric()
                    ->required(),

                TextInput::make('max_campaigns')
                    ->label('Maximum Campaigns')
                    ->numeric()
                    ->required(),

                Toggle::make('is_active')
                    ->default(true),

            ]);
    }
}

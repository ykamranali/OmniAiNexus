<?php

namespace App\Filament\Admin\Resources\Leads\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Hidden::make('organization_id')
                    ->default(fn () => auth()->user()?->organization_id),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->maxLength(255),

                Select::make('source')
                    ->options([
                        'Website' => 'Website',
                        'Facebook' => 'Facebook',
                        'Google Ads' => 'Google Ads',
                        'Referral' => 'Referral',
                        'Walk-in' => 'Walk-in',
                        'Email Campaign' => 'Email Campaign',
                        'Other' => 'Other',
                    ]),

                Select::make('status')
                    ->required()
                    ->default('New')
                    ->options([
                        'New' => 'New',
                        'Contacted' => 'Contacted',
                        'Qualified' => 'Qualified',
                        'Proposal Sent' => 'Proposal Sent',
                        'Won' => 'Won',
                        'Lost' => 'Lost',
                    ]),

                TextInput::make('value')
                    ->numeric()
                    ->default(0)
                    ->prefix('AED'),

                Textarea::make('notes')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}

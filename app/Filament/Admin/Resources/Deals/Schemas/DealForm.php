<?php

namespace App\Filament\Admin\Resources\Deals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DealForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Hidden::make('organization_id')
                    ->default(fn () => auth()->user()?->organization_id),

                Select::make('lead_id')
                    ->label('Lead')
                    ->relationship('lead', 'name')
                    ->searchable()
                    ->preload(),

                TextInput::make('title')
                    ->label('Deal Title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('amount')
                    ->label('Deal Value')
                    ->numeric()
                    ->prefix('AED')
                    ->default(0)
                    ->required(),

                Select::make('stage')
                    ->required()
                    ->default('New')
                    ->options([
                        'New' => 'New',
                        'Qualified' => 'Qualified',
                        'Proposal' => 'Proposal',
                        'Negotiation' => 'Negotiation',
                        'Won' => 'Won',
                        'Lost' => 'Lost',
                    ]),

                DatePicker::make('expected_close_date')
                    ->label('Expected Close Date'),

                Textarea::make('notes')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}

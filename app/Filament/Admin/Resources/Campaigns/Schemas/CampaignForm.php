<?php

namespace App\Filament\Admin\Resources\Campaigns\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Campaign Information')
                    ->schema([

                        TextInput::make('name')
                            ->label('Campaign Name')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),

                    ]),

                Section::make('Campaign Settings')
                    ->schema([

                        Select::make('type')
                            ->options([
                                'Social Media' => 'Social Media',
                                'Email Marketing' => 'Email Marketing',
                                'Lead Generation' => 'Lead Generation',
                                'Brand Awareness' => 'Brand Awareness',
                                'Product Launch' => 'Product Launch',
                            ])
                            ->default('Social Media')
                            ->required(),

                        Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Scheduled' => 'Scheduled',
                                'Running' => 'Running',
                                'Completed' => 'Completed',
                                'Paused' => 'Paused',
                                'Cancelled' => 'Cancelled',
                            ])
                            ->default('Draft')
                            ->required(),

                        TextInput::make('budget')
                            ->numeric()
                            ->prefix('AED')
                            ->default(0),

                    ])
                    ->columns(3),

                Section::make('Platforms')
                    ->schema([

                        CheckboxList::make('platforms')
                            ->options([
                                'LinkedIn' => 'LinkedIn',
                                'Facebook' => 'Facebook',
                                'Instagram' => 'Instagram',
                                'Twitter/X' => 'Twitter/X',
                                'TikTok' => 'TikTok',
                                'YouTube' => 'YouTube',
                            ])
                            ->columns(3),

                    ]),

                Section::make('Schedule')
                    ->schema([

                        DatePicker::make('start_date'),

                        DatePicker::make('end_date'),

                    ])
                    ->columns(2),

            ]);
    }
}

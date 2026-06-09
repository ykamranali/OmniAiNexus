<?php

namespace App\Filament\Admin\Resources\Tasks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TaskForm
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

                Select::make('deal_id')
                    ->label('Deal')
                    ->relationship('deal', 'title')
                    ->searchable()
                    ->preload(),

                Select::make('user_id')
                    ->label('Assigned User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),

                DateTimePicker::make('due_date')
                    ->label('Due Date'),

                Select::make('priority')
                    ->required()
                    ->default('Medium')
                    ->options([
                        'Low' => 'Low',
                        'Medium' => 'Medium',
                        'High' => 'High',
                    ]),

                Select::make('status')
                    ->required()
                    ->default('Pending')
                    ->options([
                        'Pending' => 'Pending',
                        'In Progress' => 'In Progress',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                    ]),
            ]);
    }
}

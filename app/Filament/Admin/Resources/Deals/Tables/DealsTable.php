<?php

namespace App\Filament\Admin\Resources\Deals\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class DealsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('organization.name')
                    ->label('Organization')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('lead.name')
                    ->label('Lead')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->label('Deal Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('AED')
                    ->sortable(),

                TextColumn::make('stage')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'New' => 'gray',
                        'Qualified' => 'info',
                        'Proposal' => 'warning',
                        'Negotiation' => 'primary',
                        'Won' => 'success',
                        'Lost' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('expected_close_date')
                    ->label('Expected Close')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([

                SelectFilter::make('stage')
                    ->options([
                        'New' => 'New',
                        'Qualified' => 'Qualified',
                        'Proposal' => 'Proposal',
                        'Negotiation' => 'Negotiation',
                        'Won' => 'Won',
                        'Lost' => 'Lost',
                    ]),

            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

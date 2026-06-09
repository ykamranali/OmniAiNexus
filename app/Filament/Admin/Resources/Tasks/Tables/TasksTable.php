<?php

namespace App\Filament\Admin\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TasksTable
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

                TextColumn::make('deal.title')
                    ->label('Deal')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Assigned To')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('priority')
                    ->badge()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'High' => 'danger',
                        'Medium' => 'warning',
                        'Low' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('status')
                    ->badge()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'In Progress' => 'info',
                        'Completed' => 'success',
                        'Cancelled' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('due_date')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
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

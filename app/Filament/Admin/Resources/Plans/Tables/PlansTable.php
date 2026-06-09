<?php

namespace App\Filament\Admin\Resources\Plans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('monthly_price')
                    ->label('Price (AED)')
                    ->sortable(),

                TextColumn::make('trial_days')
                    ->label('Trial Days')
                    ->sortable(),

                TextColumn::make('max_users')
                    ->label('Users')
                    ->sortable(),

                TextColumn::make('max_ai_requests')
                    ->label('AI Requests')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
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

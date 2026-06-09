<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SocialAccountsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')

            ->columns([

                TextColumn::make('platform')
                    ->badge()
                    ->searchable(),

                TextColumn::make('account_name')
                    ->label('Account Name')
                    ->searchable(),

                TextColumn::make('followers_count')
                    ->label('Followers')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('posts_count')
                    ->label('Posts')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Connected' => 'success',
                        'Failed' => 'danger',
                        default => 'warning',
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])

            ->headerActions([

                Action::make('connectLinkedIn')
                    ->label('Connect LinkedIn')
                    ->icon('heroicon-o-link')
                    ->color('success')
                    ->url(
                        fn () => route('social.linkedin.connect')
                    ),

                Action::make('connectFacebook')
                    ->label('Facebook (Coming Soon)')
                    ->icon('heroicon-o-globe-alt')
                    ->disabled(),

                Action::make('connectInstagram')
                    ->label('Instagram (Coming Soon)')
                    ->icon('heroicon-o-camera')
                    ->disabled(),

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

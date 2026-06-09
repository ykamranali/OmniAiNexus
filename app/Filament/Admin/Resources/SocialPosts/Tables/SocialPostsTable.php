<?php

namespace App\Filament\Admin\Resources\SocialPosts\Tables;

use App\Models\SocialPost;
use App\Services\LinkedInPublisherService;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SocialPostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')

            ->columns([

                TextColumn::make('platform')
                    ->badge()
                    ->searchable(),

                TextColumn::make('status')
                    ->badge()
                    ->searchable(),

                TextColumn::make('socialAccount.account_name')
                    ->label('Account')
                    ->searchable(),

                TextColumn::make('media_path')
                    ->label('Media')
                    ->limit(30),

                TextColumn::make('content')
                    ->limit(60)
                    ->searchable(),

                TextColumn::make('scheduled_at')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

            ])

            ->filters([
                //
            ])

            ->recordActions([

                ViewAction::make(),

                EditAction::make(),

                Action::make('publish')
                    ->label('Publish')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')

                    ->visible(
                        fn (SocialPost $record) =>
                            $record->status !== 'Published'
                    )

                    ->action(function (SocialPost $record) {

                        $result = app(
                            LinkedInPublisherService::class
                        )->publish($record);

                        Notification::make()
                            ->title(
                                $result['success']
                                    ? 'Post Published'
                                    : 'Publishing Failed'
                            )
                            ->success(
                                $result['success']
                            )
                            ->danger(
                                ! $result['success']
                            )
                            ->send();
                    }),

            ])

            ->toolbarActions([

                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),

            ]);
    }
}

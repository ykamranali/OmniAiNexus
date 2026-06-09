<?php

namespace App\Filament\Admin\Resources\SocialPosts\Schemas;

use App\Models\Campaign;
use App\Models\SocialAccount;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SocialPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('campaign_id')
                    ->label('Campaign')
                    ->options(
                        Campaign::where(
                            'organization_id',
                            auth()->user()->organization_id
                        )->pluck('name', 'id')
                    )
                    ->searchable()
                    ->preload(),

                Select::make('social_account_id')
                    ->label('Social Account')
                    ->options(
                        SocialAccount::where(
                            'organization_id',
                            auth()->user()->organization_id
                        )->pluck('account_name', 'id')
                    )
                    ->searchable()
                    ->preload(),

                Select::make('platform')
                    ->options([
                        'Facebook' => 'Facebook',
                        'Instagram' => 'Instagram',
                        'LinkedIn' => 'LinkedIn',
                        'Twitter/X' => 'Twitter/X',
                        'TikTok' => 'TikTok',
                        'YouTube' => 'YouTube',
                        'WhatsApp' => 'WhatsApp',
                        'Telegram' => 'Telegram',
                        'Snapchat' => 'Snapchat',
                    ])
                    ->required(),

                Select::make('status')
                    ->options([
                        'Draft' => 'Draft',
                        'Scheduled' => 'Scheduled',
                        'Published' => 'Published',
                        'Failed' => 'Failed',
                    ])
                    ->default('Draft')
                    ->required(),

                Textarea::make('content')
                    ->rows(8)
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('media_path')
                    ->label('Image / Video')
                    ->directory('social-posts')
                    ->columnSpanFull(),

                DateTimePicker::make('scheduled_at')
                    ->label('Schedule Date')
                    ->seconds(false),

            ]);
    }
}
?>

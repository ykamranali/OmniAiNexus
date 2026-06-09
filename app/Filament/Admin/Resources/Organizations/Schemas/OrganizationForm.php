<?php

namespace App\Filament\Admin\Resources\Organizations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(50),

                TextInput::make('website')
                    ->url()
                    ->maxLength(255),

                TextInput::make('timezone')
                    ->default('Asia/Dubai'),

                FileUpload::make('logo')
                    ->directory('organizations/logos')
                    ->image(),

                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}

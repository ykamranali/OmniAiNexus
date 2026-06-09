<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('organization_id')
                    ->label('Organization')
                    ->relationship('organization', 'name')
                    ->searchable()
                    ->preload(),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Select::make('roles')
                    ->label('Role')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload(),

                DateTimePicker::make('email_verified_at')
                    ->label('Email Verified At'),

                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(
                        fn ($state) => filled($state) ? bcrypt($state) : null
                    )
                    ->dehydrated(
                        fn ($state) => filled($state)
                    )
                    ->required(
                        fn (string $operation): bool => $operation === 'create'
                    )
                    ->maxLength(255),
            ]);
    }
}

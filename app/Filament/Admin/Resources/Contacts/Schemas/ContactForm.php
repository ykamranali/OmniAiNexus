<?php

namespace App\Filament\Admin\Resources\Contacts\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Hidden::make('organization_id')
                    ->default(fn () => auth()->user()?->organization_id),

                TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->tel()
                    ->maxLength(50),

                TextInput::make('company')
                    ->maxLength(255),

                TextInput::make('position')
                    ->maxLength(255),

                Textarea::make('notes')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}

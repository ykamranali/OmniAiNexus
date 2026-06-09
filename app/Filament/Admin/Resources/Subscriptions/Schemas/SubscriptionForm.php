<?php

namespace App\Filament\Admin\Resources\Subscriptions\Schemas;

use App\Models\Organization;
use App\Models\Plan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('organization_id')
                    ->label('Organization')
                    ->options(
                        Organization::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->required(),

                Select::make('plan_id')
                    ->label('Plan')
                    ->options(
                        Plan::query()
                            ->pluck('name', 'id')
                            ->toArray()
                    )
                    ->searchable()
                    ->required(),

                DatePicker::make('starts_at')
                    ->required(),

                DatePicker::make('expires_at')
                    ->required(),

                Select::make('status')
                    ->options([
                        'trial' => 'Trial',
                        'active' => 'Active',
                        'expired' => 'Expired',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('trial')
                    ->required(),

                TextInput::make('paypal_subscription_id')
                    ->label('PayPal Subscription ID')
                    ->maxLength(255),
            ]);
    }
}

<?php

namespace App\Filament\Admin\Resources\Subscriptions;

use App\Filament\Admin\Resources\Subscriptions\Pages\CreateSubscription;
use App\Filament\Admin\Resources\Subscriptions\Pages\EditSubscription;
use App\Filament\Admin\Resources\Subscriptions\Pages\ListSubscriptions;
use App\Filament\Admin\Resources\Subscriptions\Pages\ViewSubscription;
use App\Filament\Admin\Resources\Subscriptions\Schemas\SubscriptionForm;
use App\Filament\Admin\Resources\Subscriptions\Schemas\SubscriptionInfolist;
use App\Filament\Admin\Resources\Subscriptions\Tables\SubscriptionsTable;
use App\Models\Subscription;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Administration';

    protected static ?int $navigationSort = 4;

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasAnyRole([
            'Super Admin',
            'Organization Admin',
        ]) ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->hasAnyRole([
            'Super Admin',
            'Organization Admin',
        ]) ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        if ($user->hasRole('Super Admin')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()
            ->where(
                'organization_id',
                $user->organization_id
            );
    }

    public static function form(Schema $schema): Schema
    {
        return SubscriptionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SubscriptionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubscriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubscriptions::route('/'),
            'create' => CreateSubscription::route('/create'),
            'view' => ViewSubscription::route('/{record}'),
            'edit' => EditSubscription::route('/{record}/edit'),
        ];
    }
}

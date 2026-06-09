<?php

namespace App\Filament\Admin\Resources\SocialAccounts;

use App\Filament\Admin\Resources\SocialAccounts\Pages\CreateSocialAccount;
use App\Filament\Admin\Resources\SocialAccounts\Pages\EditSocialAccount;
use App\Filament\Admin\Resources\SocialAccounts\Pages\ListSocialAccounts;
use App\Filament\Admin\Resources\SocialAccounts\Pages\ViewSocialAccount;
use App\Filament\Admin\Resources\SocialAccounts\Schemas\SocialAccountForm;
use App\Filament\Admin\Resources\SocialAccounts\Schemas\SocialAccountInfolist;
use App\Filament\Admin\Resources\SocialAccounts\Tables\SocialAccountsTable;
use App\Models\SocialAccount;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SocialAccountResource extends Resource
{
    protected static ?string $model = SocialAccount::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedShare;

    protected static string|UnitEnum|null $navigationGroup =
        'Marketing';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel =
        'Social Accounts';

    protected static ?string $recordTitleAttribute =
        'account_name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(
                'organization_id',
                auth()->user()->organization_id
            );
    }

    public static function form(Schema $schema): Schema
    {
        return SocialAccountForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SocialAccountInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SocialAccountsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSocialAccounts::route('/'),
            'create' => CreateSocialAccount::route('/create'),
            'view' => ViewSocialAccount::route('/{record}'),
            'edit' => EditSocialAccount::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Admin\Resources\Organizations;

use App\Filament\Admin\Resources\Organizations\Pages\CreateOrganization;
use App\Filament\Admin\Resources\Organizations\Pages\EditOrganization;
use App\Filament\Admin\Resources\Organizations\Pages\ListOrganizations;
use App\Filament\Admin\Resources\Organizations\Pages\ViewOrganization;
use App\Filament\Admin\Resources\Organizations\Schemas\OrganizationForm;
use App\Filament\Admin\Resources\Organizations\Schemas\OrganizationInfolist;
use App\Filament\Admin\Resources\Organizations\Tables\OrganizationsTable;
use App\Models\Organization;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OrganizationResource extends Resource
{
    protected static ?string $model = Organization::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedBuildingOffice;

    protected static string|UnitEnum|null $navigationGroup =
        'Administration';

    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return OrganizationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OrganizationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrganizationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrganizations::route('/'),
            'create' => CreateOrganization::route('/create'),
            'view' => ViewOrganization::route('/{record}'),
            'edit' => EditOrganization::route('/{record}/edit'),
        ];
    }
}

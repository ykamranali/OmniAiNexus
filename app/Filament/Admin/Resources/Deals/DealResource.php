<?php

namespace App\Filament\Admin\Resources\Deals;

use App\Filament\Admin\Resources\Deals\Pages\CreateDeal;
use App\Filament\Admin\Resources\Deals\Pages\EditDeal;
use App\Filament\Admin\Resources\Deals\Pages\ListDeals;
use App\Filament\Admin\Resources\Deals\Pages\ViewDeal;
use App\Filament\Admin\Resources\Deals\Schemas\DealForm;
use App\Filament\Admin\Resources\Deals\Schemas\DealInfolist;
use App\Filament\Admin\Resources\Deals\Tables\DealsTable;
use App\Models\Deal;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DealResource extends Resource
{
    protected static ?string $model = Deal::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'CRM';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'title';

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
        return DealForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DealInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DealsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDeals::route('/'),
            'create' => CreateDeal::route('/create'),
            'view' => ViewDeal::route('/{record}'),
            'edit' => EditDeal::route('/{record}/edit'),
        ];
    }
}

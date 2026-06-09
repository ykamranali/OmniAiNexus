<?php

namespace App\Filament\Admin\Resources\Plans;

use App\Filament\Admin\Resources\Plans\Pages\CreatePlan;
use App\Filament\Admin\Resources\Plans\Pages\EditPlan;
use App\Filament\Admin\Resources\Plans\Pages\ListPlans;
use App\Filament\Admin\Resources\Plans\Pages\ViewPlan;
use App\Filament\Admin\Resources\Plans\Schemas\PlanForm;
use App\Filament\Admin\Resources\Plans\Schemas\PlanInfolist;
use App\Filament\Admin\Resources\Plans\Tables\PlansTable;
use App\Models\Plan;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Administration';

    protected static ?int $navigationSort = 3;

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
        return PlanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PlanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPlans::route('/'),
            'create' => CreatePlan::route('/create'),
            'view' => ViewPlan::route('/{record}'),
            'edit' => EditPlan::route('/{record}/edit'),
        ];
    }
}

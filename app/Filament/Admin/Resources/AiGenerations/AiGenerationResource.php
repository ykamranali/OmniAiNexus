<?php

namespace App\Filament\Admin\Resources\AiGenerations;

use App\Filament\Admin\Resources\AiGenerations\Pages\ListAiGenerations;
use App\Filament\Admin\Resources\AiGenerations\Pages\ViewAiGeneration;
use App\Filament\Admin\Resources\AiGenerations\Schemas\AiGenerationForm;
use App\Filament\Admin\Resources\AiGenerations\Schemas\AiGenerationInfolist;
use App\Filament\Admin\Resources\AiGenerations\Tables\AiGenerationsTable;
use App\Models\AiGeneration;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AiGenerationResource extends Resource
{
    protected static ?string $model = AiGeneration::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'AI Studio';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'type';

    public static function form(Schema $schema): Schema
    {
        return AiGenerationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AiGenerationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AiGenerationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAiGenerations::route('/'),
            'view' => ViewAiGeneration::route('/{record}'),
        ];
    }
}

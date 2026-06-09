<?php

namespace App\Filament\Admin\Resources\SocialPosts;

use App\Filament\Admin\Resources\SocialPosts\Pages\CreateSocialPost;
use App\Filament\Admin\Resources\SocialPosts\Pages\EditSocialPost;
use App\Filament\Admin\Resources\SocialPosts\Pages\ListSocialPosts;
use App\Filament\Admin\Resources\SocialPosts\Pages\ViewSocialPost;
use App\Filament\Admin\Resources\SocialPosts\Schemas\SocialPostForm;
use App\Filament\Admin\Resources\SocialPosts\Schemas\SocialPostInfolist;
use App\Filament\Admin\Resources\SocialPosts\Tables\SocialPostsTable;
use App\Models\SocialPost;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SocialPostResource extends Resource
{
    protected static ?string $model = SocialPost::class;

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup =
        'Marketing';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute =
        'platform';

    public static function form(Schema $schema): Schema
    {
        return SocialPostForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SocialPostInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SocialPostsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where(
                'organization_id',
                auth()->user()->organization_id
            );
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSocialPosts::route('/'),
            'create' => CreateSocialPost::route('/create'),
            'view' => ViewSocialPost::route('/{record}'),
            'edit' => EditSocialPost::route('/{record}/edit'),
        ];
    }
}

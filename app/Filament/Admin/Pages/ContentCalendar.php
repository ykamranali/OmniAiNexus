<?php

namespace App\Filament\Admin\Pages;

use App\Models\SocialPost;
use Filament\Pages\Page;

class ContentCalendar extends Page
{
    protected string $view =
        'filament.admin.pages.content-calendar';

    public array $posts = [];

    public function mount(): void
    {
        $this->posts = SocialPost::query()
            ->where(
                'organization_id',
                auth()->user()->organization_id
            )
            ->orderBy('scheduled_at')
            ->get()
            ->toArray();
    }

    public static function getNavigationLabel(): string
    {
        return 'Content Calendar';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Marketing';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-calendar-days';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }
}

<?php

namespace App\Filament\Admin\Widgets;

use App\Models\SocialAccount;
use App\Models\SocialPost;
use Filament\Widgets\Widget;

class SocialPerformanceWidget extends Widget
{
    protected string $view =
        'filament.admin.widgets.social-performance-widget';

    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'accounts' => SocialAccount::count(),
            'posts' => SocialPost::count(),
            'published' => SocialPost::where(
                'status',
                'Published'
            )->count(),
        ];
    }
}

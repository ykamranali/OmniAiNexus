<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Activity;
use Filament\Widgets\Widget;

class RecentActivity extends Widget
{
    protected string $view = 'filament.admin.widgets.recent-activity';

    protected int|string|array $columnSpan = 'full';

    public function getActivities()
    {
        return Activity::latest()
            ->take(15)
            ->get();
    }
}

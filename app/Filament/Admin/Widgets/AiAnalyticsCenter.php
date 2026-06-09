<?php

namespace App\Filament\Admin\Widgets;

use App\Models\AiGeneration;
use App\Models\Lead;
use App\Models\Deal;
use Filament\Widgets\Widget;

class AiAnalyticsCenter extends Widget
{
    protected string $view =
        'filament.admin.widgets.ai-analytics-center';

    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        return [
            'leads' => Lead::count(),
            'deals' => Deal::count(),
            'aiContent' => AiGeneration::count(),
        ];
    }
}

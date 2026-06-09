<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Deal;
use App\Models\Lead;
use App\Models\Task;
use App\Support\PlanLimit;
use Filament\Widgets\Widget;

class OmniAiHero extends Widget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 1;

    protected string $view =
        'filament.admin.widgets.omni-ai-hero';

    protected int|string|array $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'leads' => Lead::count(),
            'deals' => Deal::count(),
            'tasks' => Task::count(),
            'usedTokens' => PlanLimit::usedAiTokens(),
            'remainingTokens' => PlanLimit::remainingAiTokens(),
        ];
    }
}

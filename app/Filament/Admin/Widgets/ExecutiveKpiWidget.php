<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Deal;
use App\Models\Lead;
use Filament\Widgets\Widget;

class ExecutiveKpiWidget extends Widget
{
    protected string $view =
        'filament.admin.widgets.executive-kpi-widget';

    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        $revenue = Deal::where('stage', 'Won')
            ->sum('amount');

        $pipeline = Deal::whereNotIn(
            'stage',
            ['Won', 'Lost']
        )->sum('amount');

        $wonDeals = Deal::where(
            'stage',
            'Won'
        )->count();

        $totalLeads = Lead::count();

        $conversionRate = $totalLeads > 0
            ? round(($wonDeals / $totalLeads) * 100)
            : 0;

        return [
            'revenue' => number_format($revenue, 0),
            'pipeline' => number_format($pipeline, 0),
            'wonDeals' => $wonDeals,
            'conversionRate' => $conversionRate,
        ];
    }
}

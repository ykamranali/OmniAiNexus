<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Deal;
use Filament\Widgets\ChartWidget;

class DealPipelineChart extends ChartWidget
{
    protected ?string $heading =
        'Sales Opportunity Distribution';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Deals',

                    'data' => [
                        Deal::where('stage', 'New')->count(),
                        Deal::where('stage', 'Qualified')->count(),
                        Deal::where('stage', 'Proposal')->count(),
                        Deal::where('stage', 'Negotiation')->count(),
                        Deal::where('stage', 'Won')->count(),
                        Deal::where('stage', 'Lost')->count(),
                    ],

                    'backgroundColor' => [
                        '#64748b',
                        '#3b82f6',
                        '#f59e0b',
                        '#8b5cf6',
                        '#10b981',
                        '#ef4444',
                    ],

                    'borderWidth' => 0,
                ],
            ],

            'labels' => [
                'New',
                'Qualified',
                'Proposal',
                'Negotiation',
                'Won',
                'Lost',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

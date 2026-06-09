<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Lead;
use Filament\Widgets\ChartWidget;

class LeadStatusChart extends ChartWidget
{
    protected ?string $heading =
        'Lead Conversion Funnel';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Leads',

                    'data' => [
                        Lead::where('status', 'New')->count(),
                        Lead::where('status', 'Contacted')->count(),
                        Lead::where('status', 'Qualified')->count(),
                        Lead::where('status', 'Proposal Sent')->count(),
                        Lead::where('status', 'Won')->count(),
                        Lead::where('status', 'Lost')->count(),
                    ],

                    'backgroundColor' => [
                        '#3b82f6',
                        '#06b6d4',
                        '#8b5cf6',
                        '#f59e0b',
                        '#10b981',
                        '#ef4444',
                    ],

                    'borderWidth' => 0,
                ],
            ],

            'labels' => [
                'New',
                'Contacted',
                'Qualified',
                'Proposal',
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

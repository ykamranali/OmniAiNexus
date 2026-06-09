<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Subscription;
use Filament\Widgets\ChartWidget;

class RevenueChart extends ChartWidget
{
    protected ?string $heading = 'Subscription Growth';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Subscriptions',
                    'data' => [
                        Subscription::count(),
                    ],
                ],
            ],

            'labels' => [
                'Current',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

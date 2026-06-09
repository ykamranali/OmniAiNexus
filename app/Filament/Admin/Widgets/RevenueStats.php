<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Deal;
use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueStats extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $wonRevenue = Deal::where('stage', 'Won')
            ->sum('amount');

        $pipelineValue = Deal::whereNotIn(
            'stage',
            ['Won', 'Lost']
        )->sum('amount');

        $wonDeals = Deal::where('stage', 'Won')
            ->count();

        $lostDeals = Deal::where('stage', 'Lost')
            ->count();

        $averageDealSize = Deal::avg('amount') ?? 0;

        $openTasks = Task::where(
            'status',
            '!=',
            'Completed'
        )->count();

        return [

            Stat::make(
                'Won Revenue',
                'AED ' . number_format(
                    $wonRevenue,
                    2
                )
            )
                ->description('Closed Won Deals')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make(
                'Pipeline Value',
                'AED ' . number_format(
                    $pipelineValue,
                    2
                )
            )
                ->description('Open Opportunities')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('warning'),

            Stat::make(
                'Won Deals',
                $wonDeals
            )
                ->description('Successfully Closed')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('success'),

            Stat::make(
                'Lost Deals',
                $lostDeals
            )
                ->description('Closed Lost')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),

            Stat::make(
                'Average Deal Size',
                'AED ' . number_format(
                    $averageDealSize,
                    2
                )
            )
                ->description('Average Opportunity Value')
                ->descriptionIcon('heroicon-m-calculator')
                ->color('info'),

            Stat::make(
                'Open Tasks',
                $openTasks
            )
                ->description('Pending Follow Ups')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('primary'),

        ];
    }
}

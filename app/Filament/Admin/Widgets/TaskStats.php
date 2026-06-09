<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Task;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TaskStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make(
                'Tasks Due Today',
                Task::whereDate('due_date', today())->count()
            )
                ->description('Due Today')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),

            Stat::make(
                'Overdue Tasks',
                Task::whereDate('due_date', '<', today())
                    ->where('status', '!=', 'Completed')
                    ->count()
            )
                ->description('Need Attention')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color('danger'),

            Stat::make(
                'Pending Tasks',
                Task::where('status', 'Pending')->count()
            )
                ->description('Awaiting Action')
                ->descriptionIcon('heroicon-m-clock')
                ->color('info'),

            Stat::make(
                'Completed Tasks',
                Task::where('status', 'Completed')->count()
            )
                ->description('Finished')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

        ];
    }
}

<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Deal;
use App\Models\Lead;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ConversionStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalLeads = Lead::count();

        $convertedLeads = Deal::distinct('lead_id')
            ->whereNotNull('lead_id')
            ->count();

        $conversionRate = $totalLeads > 0
            ? round(($convertedLeads / $totalLeads) * 100, 2)
            : 0;

        return [

            Stat::make(
                'Conversion Rate',
                $conversionRate . '%'
            )
                ->description(
                    "{$convertedLeads} of {$totalLeads} leads converted"
                )
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make(
                'Total Leads',
                $totalLeads
            )
                ->description('All Leads')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('info'),

            Stat::make(
                'Converted Leads',
                $convertedLeads
            )
                ->description('Converted To Deals')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('warning'),

        ];
    }
}

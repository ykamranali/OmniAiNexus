<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Contact;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\Organization;
use App\Models\Subscription;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make('Organizations', Organization::count())
                ->description('Total Organizations')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('success'),

            Stat::make('Contacts', Contact::count())
                ->description('Total Contacts')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Leads', Lead::count())
                ->description('Total Leads')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('warning'),

            Stat::make('Deals', Deal::count())
                ->description('Total Deals')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),

            Stat::make(
                'Active Subscriptions',
                Subscription::where('status', 'active')->count()
            )
                ->description('Currently Active')
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('success'),

            Stat::make(
                'Pipeline Value (AED)',
                number_format(
                    Deal::whereNotIn('stage', ['Won', 'Lost'])
                        ->sum('amount'),
                    2
                )
            )
                ->description('Open Opportunities')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),

            Stat::make(
                'Won Deals (AED)',
                number_format(
                    Deal::where('stage', 'Won')
                        ->sum('amount'),
                    2
                )
            )
                ->description('Closed Revenue')
                ->descriptionIcon('heroicon-m-trophy')
                ->color('success'),

        ];
    }
}

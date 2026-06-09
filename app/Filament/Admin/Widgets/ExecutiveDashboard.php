<?php

namespace App\Filament\Admin\Widgets;

use App\Models\AiGeneration;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\SocialAccount;
use App\Models\SocialPost;
use App\Models\Task;
use Filament\Widgets\Widget;

class ExecutiveDashboard extends Widget
{
    protected string $view =
        'filament.admin.widgets.executive-dashboard';

    protected int|string|array $columnSpan = 'full';

    public function getViewData(): array
    {
        $orgId = auth()->user()?->organization_id;

        $wonRevenue = Deal::where(
            'organization_id',
            $orgId
        )
        ->where('stage', 'Won')
        ->sum('amount');

        $pipelineValue = Deal::where(
            'organization_id',
            $orgId
        )
        ->whereNotIn('stage', ['Won', 'Lost'])
        ->sum('amount');

        $totalDeals = Deal::where(
            'organization_id',
            $orgId
        )->count();

        $wonDeals = Deal::where(
            'organization_id',
            $orgId
        )
        ->where('stage', 'Won')
        ->count();

        $conversionRate = $totalDeals > 0
            ? round(($wonDeals / $totalDeals) * 100, 1)
            : 0;

        $leadCount = Lead::where(
            'organization_id',
            $orgId
        )->count();

        $openTasks = Task::where(
            'organization_id',
            $orgId
        )
        ->where('status', '!=', 'Completed')
        ->count();

        $aiGenerations = AiGeneration::where(
            'organization_id',
            $orgId
        )->count();

        $socialAccounts = SocialAccount::where(
            'organization_id',
            $orgId
        )->count();

        $socialPosts = SocialPost::where(
            'organization_id',
            $orgId
        )->count();

        $publishedPosts = SocialPost::where(
            'organization_id',
            $orgId
        )
        ->where('status', 'Published')
        ->count();

        $scheduledPosts = SocialPost::where(
            'organization_id',
            $orgId
        )
        ->where('status', 'Scheduled')
        ->count();

        $healthScore = min(
            100,
            (
                ($leadCount * 5) +
                ($wonDeals * 10) +
                ($aiGenerations * 3) +
                ($publishedPosts * 5)
            )
        );

        return [

            'revenue' => number_format(
                $wonRevenue,
                2
            ),

            'pipeline' => number_format(
                $pipelineValue,
                2
            ),

            'leads' => $leadCount,

            'conversionRate' => $conversionRate,

            'tasks' => $openTasks,

            'aiGenerations' => $aiGenerations,

            'socialAccounts' => $socialAccounts,

            'socialPosts' => $socialPosts,

            'publishedPosts' => $publishedPosts,

            'scheduledPosts' => $scheduledPosts,

            'healthScore' => $healthScore,

            'recentDeals' => Deal::where(
                'organization_id',
                $orgId
            )
            ->latest()
            ->take(5)
            ->get(),
        ];
    }
}

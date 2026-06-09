<?php

namespace App\Filament\Admin\Pages;

use App\Models\Activity;
use App\Models\AiGeneration;
use App\Models\Campaign;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\SocialAccount;
use App\Models\SocialPost;
use App\Models\SocialMetric;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected string $view =
        'filament.admin.pages.dashboard';

    /*
    |--------------------------------------------------------------------------
    | KPI DATA
    |--------------------------------------------------------------------------
    */

    public function getRevenueProperty(): float
    {
        return Deal::where(
            'organization_id',
            auth()->user()->organization_id
        )->sum('amount');
    }

    public function getLeadsCountProperty(): int
    {
        return Lead::where(
            'organization_id',
            auth()->user()->organization_id
        )->count();
    }

    public function getCampaignsCountProperty(): int
    {
        return Campaign::where(
            'organization_id',
            auth()->user()->organization_id
        )->count();
    }

    public function getAiCountProperty(): int
    {
        return AiGeneration::where(
            'organization_id',
            auth()->user()->organization_id
        )->count();
    }

    /*
    |--------------------------------------------------------------------------
    | CONNECTED ACCOUNTS
    |--------------------------------------------------------------------------
    */

    public function getConnectedAccountsProperty()
    {
        return SocialAccount::where(
            'organization_id',
            auth()->user()->organization_id
        )
        ->where('status', 'Connected')
        ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | PLATFORM ACCOUNTS
    |--------------------------------------------------------------------------
    */

    public function getInstagramAccountProperty()
    {
        return $this->connectedAccounts
            ->where('platform', 'Instagram')
            ->first();
    }

    public function getFacebookAccountProperty()
    {
        return $this->connectedAccounts
            ->where('platform', 'Facebook')
            ->first();
    }

    public function getTikTokAccountProperty()
    {
        return $this->connectedAccounts
            ->where('platform', 'TikTok')
            ->first();
    }

    public function getYoutubeAccountProperty()
    {
        return $this->connectedAccounts
            ->where('platform', 'YouTube')
            ->first();
    }

    public function getLinkedinAccountProperty()
    {
        return $this->connectedAccounts
            ->where('platform', 'LinkedIn')
            ->first();
    }

    public function getXAccountProperty()
    {
        return $this->connectedAccounts
            ->where('platform', 'X')
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | FOLLOWERS
    |--------------------------------------------------------------------------
    */

    public function getInstagramFollowersProperty(): int
    {
        return optional($this->instagramAccount)
            ->followers_count ?? 0;
    }

    public function getFacebookFollowersProperty(): int
    {
        return optional($this->facebookAccount)
            ->followers_count ?? 0;
    }

    public function getTikTokFollowersProperty(): int
    {
        return optional($this->tikTokAccount)
            ->followers_count ?? 0;
    }

    public function getYoutubeFollowersProperty(): int
    {
        return optional($this->youtubeAccount)
            ->followers_count ?? 0;
    }

    public function getLinkedinFollowersProperty(): int
    {
        return optional($this->linkedinAccount)
            ->followers_count ?? 0;
    }

    public function getXFollowersProperty(): int
    {
        return optional($this->xAccount)
            ->followers_count ?? 0;
    }
   
/*
|--------------------------------------------------------------------------
| ANALYTICS
|--------------------------------------------------------------------------
*/

public function getTotalReachProperty(): int
{
    return SocialMetric::where(
        'organization_id',
        auth()->user()->organization_id
    )->sum('reach');
}

public function getTotalImpressionsProperty(): int
{
    return SocialMetric::where(
        'organization_id',
        auth()->user()->organization_id
    )->sum('impressions');
}

public function getTotalEngagementProperty(): int
{
    return
        SocialMetric::where(
            'organization_id',
            auth()->user()->organization_id
        )->sum('likes')

        +

        SocialMetric::where(
            'organization_id',
            auth()->user()->organization_id
        )->sum('comments')

        +

        SocialMetric::where(
            'organization_id',
            auth()->user()->organization_id
        )->sum('shares');
}
    /*
    |--------------------------------------------------------------------------
    | POSTS
    |--------------------------------------------------------------------------
    */

    public function getTopPostsProperty()
    {
        return SocialPost::where(
            'organization_id',
            auth()->user()->organization_id
        )
        ->latest()
        ->take(5)
        ->get();
    }

    /*
|--------------------------------------------------------------------------
| AI RECOMMENDATIONS
|--------------------------------------------------------------------------
*/

public function getRecommendationsProperty(): array
{
    $recommendations = [];

    // No campaigns yet
    if ($this->campaignsCount === 0) {

        $recommendations[] = [
            'icon' => '🚀',
            'title' => 'Create your first campaign',
            'subtitle' => 'Start reaching your audience',
        ];
    }

    // More leads than campaigns
    if (
        $this->leadsCount > 0 &&
        $this->campaignsCount < $this->leadsCount
    ) {

        $recommendations[] = [
            'icon' => '🎯',
            'title' => 'Launch lead nurturing campaign',
            'subtitle' => 'Convert inactive leads',
        ];
    }

    // AI usage low
    if ($this->aiCount < 5) {

        $recommendations[] = [
            'icon' => '🤖',
            'title' => 'Use AI Studio more often',
            'subtitle' => 'Automate content creation',
        ];
    }

    // LinkedIn weak
    if ($this->linkedinFollowers < 100) {

        $recommendations[] = [
            'icon' => '💼',
            'title' => 'Grow LinkedIn presence',
            'subtitle' => 'Increase professional reach',
        ];
    }

    // Fallback
    if (empty($recommendations)) {

        $recommendations[] = [
            'icon' => '✅',
            'title' => 'Everything looks healthy',
            'subtitle' => 'Keep growing your audience',
        ];
    }

    return array_slice($recommendations, 0, 4);
}

    /*
    |--------------------------------------------------------------------------
    | RECENT ACTIVITY
    |--------------------------------------------------------------------------
    */

    public function getRecentActivitiesProperty()
    {
        return Activity::with('user')
            ->where(
                'organization_id',
                auth()->user()->organization_id
            )
            ->latest()
            ->take(10)
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | ACTIVITY HELPERS
    |--------------------------------------------------------------------------
    */

    public function activityColor(string $type): string
    {
        return match ($type) {

            'campaign' => '#8b5cf6',
            'lead' => '#06b6d4',
            'ai' => '#10b981',
            'social_post' => '#f59e0b',

            default => '#94a3b8',
        };
    }

    public function activityIcon(string $type): string
    {
        return match ($type) {

            'campaign' => '🚀',
            'lead' => '👤',
            'ai' => '🤖',
            'social_post' => '📢',

            default => '📌',
        };
    }

    /*
    |--------------------------------------------------------------------------
    | NAVIGATION
    |--------------------------------------------------------------------------
    */

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-home';
    }
}

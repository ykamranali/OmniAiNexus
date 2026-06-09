<?php

namespace App\Services;

use App\Models\SocialAccount;
use App\Models\SocialMetric;

class SocialMetricsSyncService
{
    public function sync(SocialAccount $account): void
    {
        SocialMetric::updateOrCreate(

            [
                'organization_id' => $account->organization_id,
                'platform' => $account->platform,
                'date' => now()->toDateString(),
            ],

            [
                'followers' => $account->followers_count,
                'posts_count' => $account->posts_count,
            ]

        );
    }
}

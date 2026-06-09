<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SocialAccount;
use App\Services\SocialMetricsSyncService;

class SyncSocialMetrics extends Command
{
    protected $signature = 'social:sync-metrics';

    protected $description = 'Sync social metrics';

    public function handle(
        SocialMetricsSyncService $service
    ): int {

        SocialAccount::where(
            'status',
            'Connected'
        )
        ->get()
        ->each(function ($account) use ($service) {

            $service->sync($account);

        });

        $this->info(
            'Social metrics synced successfully.'
        );

        return self::SUCCESS;
    }
}

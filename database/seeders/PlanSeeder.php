<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::updateOrCreate(
            ['name' => 'Starter'],
            [
                'monthly_price' => 49,
                'trial_days' => 7,

                'max_users' => 2,
                'max_leads' => 100,
                'max_deals' => 100,
                'max_tasks' => 200,

                'max_social_accounts' => 3,
                'max_ai_tokens' => 1000,

                'max_ai_requests' => 1000,
                'max_campaigns' => 10,

                'is_active' => true,
            ]
        );

        Plan::updateOrCreate(
            ['name' => 'Pro Marketer'],
            [
                'monthly_price' => 149,
                'trial_days' => 14,

                'max_users' => 10,
                'max_leads' => 1000,
                'max_deals' => 1000,
                'max_tasks' => 5000,

                'max_social_accounts' => 12,
                'max_ai_tokens' => 10000,

                'max_ai_requests' => 10000,
                'max_campaigns' => 100,

                'is_active' => true,
            ]
        );

        Plan::updateOrCreate(
            ['name' => 'Enterprise'],
            [
                'monthly_price' => 999,
                'trial_days' => 30,

                'max_users' => 999999,
                'max_leads' => 999999,
                'max_deals' => 999999,
                'max_tasks' => 999999,

                'max_social_accounts' => 999999,
                'max_ai_tokens' => 999999,

                'max_ai_requests' => 999999,
                'max_campaigns' => 999999,

                'is_active' => true,
            ]
        );
    }
}

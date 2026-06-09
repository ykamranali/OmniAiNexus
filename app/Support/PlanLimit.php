<?php

namespace App\Support;

use App\Models\AiGeneration;
use App\Models\SocialAccount;
use App\Models\Subscription;

class PlanLimit
{
    public static function currentPlan()
    {
        $organizationId = auth()->user()?->organization_id;

        return Subscription::with('plan')
            ->where('organization_id', $organizationId)
            ->where('status', 'active')
            ->latest()
            ->first()?->plan;
    }

    public static function canCreateUser(): bool
    {
        $plan = self::currentPlan();

        if (! $plan) {
            return false;
        }

        $organization = auth()->user()->organization;

        return $organization->users()->count() < $plan->max_users;
    }

    public static function canCreateSocialAccount(): bool
    {
        $plan = self::currentPlan();

        if (! $plan) {
            return false;
        }

        $currentCount = SocialAccount::where(
            'organization_id',
            auth()->user()->organization_id
        )->count();

        return $currentCount < $plan->max_social_accounts;
    }

    public static function usedAiTokens(): int
    {
        return AiGeneration::where(
            'organization_id',
            auth()->user()->organization_id
        )->sum('tokens_used');
    }

    public static function aiTokenLimit(): int
    {
        $plan = self::currentPlan();

        return $plan?->max_ai_tokens ?? 0;
    }

    public static function remainingAiTokens(): int
    {
        return max(
            0,
            self::aiTokenLimit() - self::usedAiTokens()
        );
    }
}

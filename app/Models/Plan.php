<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'monthly_price',
        'trial_days',

        'max_users',
        'max_ai_requests',
        'max_campaigns',

        'max_leads',
        'max_deals',
        'max_tasks',
        'max_social_accounts',
        'max_ai_tokens',

        'is_active',
    ];
}

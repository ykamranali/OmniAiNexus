<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialMetric extends Model
{
    protected $fillable = [

        'organization_id',
        'platform',
        'date',

        'followers',
        'impressions',
        'reach',

        'likes',
        'comments',
        'shares',

        'clicks',
        'profile_visits',
        'posts_count',

        'engagement_rate',

    ];

    protected $casts = [

        'date' => 'date',
        'engagement_rate' => 'float',

    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            Organization::class
        );
    }
}

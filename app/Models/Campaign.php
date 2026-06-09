<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    protected $fillable = [
        'organization_id',
        'name',
        'description',
        'type',
        'status',
        'budget',
        'start_date',
        'end_date',
        'platforms',
    ];

    protected $casts = [
        'budget' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'platforms' => 'array',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            Organization::class
        );
    }

    public function socialPosts(): HasMany
    {
        return $this->hasMany(
            SocialPost::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function getPublishedPostsCountAttribute(): int
    {
        return $this->socialPosts()
            ->where('status', 'Published')
            ->count();
    }

    public function getScheduledPostsCountAttribute(): int
    {
        return $this->socialPosts()
            ->where('status', 'Scheduled')
            ->count();
    }

    public function getDraftPostsCountAttribute(): int
    {
        return $this->socialPosts()
            ->where('status', 'Draft')
            ->count();
    }
}

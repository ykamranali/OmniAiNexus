<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialAccount extends Model
{
    protected $fillable = [
        'organization_id',
        'platform',
        'account_name',
        'account_id',
        'access_token',
        'refresh_token',
        'token_expires_at',
        'metadata',
        'last_sync_at',
        'followers_count',
        'following_count',
        'posts_count',
        'status',
    ];

  protected $casts = [
    'metadata' => 'array',
    'token_expires_at' => 'datetime',
    'last_sync_at' => 'datetime',
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
            SocialPost::class,
            'social_account_id'
        );
    }

    public function isConnected(): bool
    {
        return $this->status === 'Connected';
    }
}

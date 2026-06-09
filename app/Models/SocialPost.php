<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SocialPost extends Model
{
    protected $fillable = [
        'organization_id',
        'campaign_id',
        'social_account_id',
        'platform',
        'content',
        'media_path',
        'media_type',
        'status',
        'scheduled_at',
        'published_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'published_at' => 'datetime',
    ];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            Organization::class
        );
    }

    public function socialAccount(): BelongsTo
    {
        return $this->belongsTo(
            SocialAccount::class
        );
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(
            Campaign::class
        );
    }
}
?>

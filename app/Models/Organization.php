<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\User;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Deal;
use App\Models\Task;
use App\Models\Subscription;
use App\Models\SocialAccount;
use App\Models\SocialPost;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'owner_id',
        'email',
        'phone',
        'website',
        'logo',
        'timezone',
        'is_active',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'owner_id'
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(
            User::class,
            'organization_id'
        );
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(
            Contact::class,
            'organization_id'
        );
    }

    public function leads(): HasMany
    {
        return $this->hasMany(
            Lead::class,
            'organization_id'
        );
    }

    public function deals(): HasMany
    {
        return $this->hasMany(
            Deal::class,
            'organization_id'
        );
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(
            Task::class,
            'organization_id'
        );
    }

    public function socialAccounts(): HasMany
    {
        return $this->hasMany(
            SocialAccount::class,
            'organization_id'
        );
    }

    public function socialPosts(): HasMany
    {
        return $this->hasMany(
            SocialPost::class,
            'organization_id'
        );
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(
            Subscription::class,
            'organization_id'
        );
    }

    public function activeSubscription()
    {
        return $this->subscriptions()
            ->where('status', 'active')
            ->latest()
            ->first();
    }

    public function currentPlan()
    {
        return $this->activeSubscription()?->plan;
    }
}

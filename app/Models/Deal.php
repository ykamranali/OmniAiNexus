<?php

namespace App\Models;

use App\Support\ActivityLogger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deal extends Model
{
    protected $fillable = [
        'organization_id',
        'lead_id',
        'title',
        'amount',
        'stage',
        'expected_close_date',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'expected_close_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::created(function (Deal $deal) {

            ActivityLogger::log(
                'deal_created',
                'Deal "' . $deal->title . '" created.',
                $deal
            );
        });

        static::updated(function (Deal $deal) {

            if ($deal->wasChanged('stage')) {

                $oldStage = $deal->getOriginal('stage');
                $newStage = $deal->stage;

                ActivityLogger::log(
                    'deal_stage_changed',
                    'Deal "' . $deal->title .
                    '" moved from "' .
                    $oldStage .
                    '" to "' .
                    $newStage . '"',
                    $deal
                );
            }
        });
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }
}

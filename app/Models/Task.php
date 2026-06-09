<?php

namespace App\Models;

use App\Support\ActivityLogger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'organization_id',
        'lead_id',
        'deal_id',
        'user_id',
        'title',
        'description',
        'due_date',
        'status',
        'priority',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::created(function (Task $task) {

            ActivityLogger::log(
                'task_created',
                'Task "' . $task->title . '" created.',
                $task
            );
        });

        static::updated(function (Task $task) {

            if ($task->wasChanged('status')) {

                $oldStatus = $task->getOriginal('status');
                $newStatus = $task->status;

                ActivityLogger::log(
                    'task_status_changed',
                    'Task "' . $task->title .
                    '" changed from "' .
                    $oldStatus .
                    '" to "' .
                    $newStatus . '"',
                    $task
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

    public function deal(): BelongsTo
    {
        return $this->belongsTo(Deal::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

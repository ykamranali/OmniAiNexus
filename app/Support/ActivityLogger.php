<?php

namespace App\Support;

use App\Models\Activity;

class ActivityLogger
{
    public static function log(
        string $type,
        string $description,
        $subject = null
    ): void {

        Activity::create([
            'organization_id' => auth()->user()?->organization_id,
            'user_id' => auth()->id(),

            'type' => $type,

            'description' => $description,

            'subject_type' => $subject
                ? get_class($subject)
                : null,

            'subject_id' => $subject?->id,
        ]);
    }
}

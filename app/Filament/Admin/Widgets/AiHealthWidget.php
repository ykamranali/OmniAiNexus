<?php

namespace App\Filament\Admin\Widgets;

use App\Models\AiGeneration;
use App\Models\Deal;
use App\Models\Lead;
use App\Models\SocialPost;
use App\Models\Task;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;

class AiHealthWidget extends Widget
{
    protected string $view =
        'filament.admin.widgets.ai-health-widget';

    protected int|string|array $columnSpan = 1;

    public function getViewData(): array
    {
        return Cache::remember(
            'ai_health_widget',
            now()->addMinutes(5),
            function () {

                $leads = Lead::count();

                $tasks = Task::count();

                $aiContent = AiGeneration::count();

                $wonDeals = Deal::where(
                    'stage',
                    'Won'
                )->count();

                $publishedPosts = SocialPost::where(
                    'status',
                    'Published'
                )->count();

                $score = min(
                    100,
                    (
                        $leads * 5 +
                        $wonDeals * 10 +
                        $aiContent * 3 +
                        $publishedPosts * 5
                    )
                );

                return [
                    'score' => $score,
                    'leads' => $leads,
                    'tasks' => $tasks,
                    'aiContent' => $aiContent,
                    'wonDeals' => $wonDeals,
                ];
            }
        );
    }
}

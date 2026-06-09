<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\Widget;

class RecommendationsWidget extends Widget
{
    protected string $view =
        'filament.admin.widgets.recommendations-widget';

    protected int|string|array $columnSpan = 1;
}

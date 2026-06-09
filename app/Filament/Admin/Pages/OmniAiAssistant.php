<?php

namespace App\Filament\Admin\Pages;

use App\Services\OpenAIService;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class OmniAiAssistant extends Page
{
    protected string $view =
        'filament.admin.pages.omni-ai-assistant';

    public string $question = '';

    public string $answer = '';

    public function ask(): void
    {
        if (blank($this->question)) {

            Notification::make()
                ->title('Please enter a question.')
                ->warning()
                ->send();

            return;
        }

        $ai = new OpenAIService();

        $result = $ai->generate($this->question);

        if (! $result['success']) {

            Notification::make()
                ->title('AI Request Failed')
                ->danger()
                ->send();

            return;
        }

        $this->answer = $result['content'];
    }

    public static function getNavigationLabel(): string
    {
        return 'OmniAI Assistant';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'AI Studio';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-sparkles';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }
}

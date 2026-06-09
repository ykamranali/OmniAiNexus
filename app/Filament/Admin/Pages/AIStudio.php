<?php

namespace App\Filament\Admin\Pages;

use App\Models\AiGeneration;
use App\Models\SocialPost;
use App\Services\OpenAIService;
use App\Support\PlanLimit;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class AIStudio extends Page
{
    protected string $view =
        'filament.admin.pages.a-i-studio';

    public string $provider = 'OpenAI';

    public string $contentType = 'Social Post';

    public string $prompt = '';

    public string $generatedContent = '';

    public function generateContent(): void
    {
        if (blank($this->prompt)) {

            Notification::make()
                ->title('Please enter a prompt.')
                ->warning()
                ->send();

            return;
        }

        if (PlanLimit::remainingAiTokens() <= 0) {

            Notification::make()
                ->title('AI Token Limit Reached')
                ->body('Please upgrade your subscription plan.')
                ->danger()
                ->send();

            return;
        }

        $ai = new OpenAIService();

        $result = $ai->generate($this->prompt);

        if (! $result['success']) {

            Notification::make()
                ->title('AI Generation Failed')
                ->body($result['error'])
                ->danger()
                ->send();

            return;
        }

        $this->generatedContent = $result['content'];

        AiGeneration::create([
            'organization_id' => auth()->user()->organization_id,
            'user_id' => auth()->id(),
            'provider' => $this->provider,
            'model' => 'gpt-4o-mini',
            'type' => $this->contentType,
            'prompt' => $this->prompt,
            'response' => $result['content'],
            'tokens_used' => $result['tokens'],
        ]);

        Notification::make()
            ->title('Content Generated')
            ->success()
            ->send();
    }

    public function saveAsSocialPost(): void
    {
        if (blank($this->generatedContent)) {

            Notification::make()
                ->title('No generated content found.')
                ->warning()
                ->send();

            return;
        }

        SocialPost::create([
            'organization_id' => auth()->user()->organization_id,
            'social_account_id' => null,
            'platform' => 'LinkedIn',
            'content' => $this->generatedContent,
            'status' => 'Draft',
        ]);

        Notification::make()
            ->title('Saved as Social Post Draft')
            ->success()
            ->send();
    }

    public function getPlanLimitProperty(): int
    {
        return PlanLimit::aiTokenLimit();
    }

    public function getUsedTokensProperty(): int
    {
        return PlanLimit::usedAiTokens();
    }

    public function getRemainingTokensProperty(): int
    {
        return PlanLimit::remainingAiTokens();
    }

    public static function getNavigationLabel(): string
    {
        return 'AI Content Generator';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'AI Studio';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-cpu-chip';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }
}

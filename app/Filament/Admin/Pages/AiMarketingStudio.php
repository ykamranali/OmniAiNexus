<?php

namespace App\Filament\Admin\Pages;

use App\Models\Campaign;
use App\Models\SocialPost;
use App\Services\OpenAIService;
use BackedEnum;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Livewire\WithFileUploads;
use UnitEnum;

class AiMarketingStudio extends Page
{
    use WithFileUploads;

    protected string $view =
        'filament.admin.pages.ai-marketing-studio';

    protected static string|UnitEnum|null $navigationGroup =
        'Marketing';

    protected static ?string $navigationLabel =
        'AI Marketing Studio';

    protected static string|BackedEnum|null $navigationIcon =
        'heroicon-o-sparkles';

    public ?int $campaignId = null;

    public string $platform = 'LinkedIn';

    public string $topic = '';

    public string $tone = 'Professional';

    public string $generatedContent = '';

    public $image;

    public ?string $scheduledAt = null;

    public function generateContent(): void
    {
        if (blank($this->topic)) {

            Notification::make()
                ->title('Topic is required')
                ->danger()
                ->send();

            return;
        }

        $campaignName = '';

        if ($this->campaignId) {

            $campaign = Campaign::find(
                $this->campaignId
            );

            $campaignName =
                $campaign?->name ?? '';
        }

        $prompt = "
Generate a professional social media post.

Campaign: {$campaignName}

Platform: {$this->platform}

Topic: {$this->topic}

Tone: {$this->tone}

Include:
- Strong opening hook
- Professional content
- Call to action
- Relevant hashtags
";

        $response = app(
            OpenAIService::class
        )->generate($prompt);

        $this->generatedContent =
            $response['content'] ?? '';

        Notification::make()
            ->title(
                'Content Generated Successfully'
            )
            ->success()
            ->send();
    }

    public function saveAsDraft(): void
    {
        if (blank($this->generatedContent)) {

            Notification::make()
                ->title('Generate content first')
                ->danger()
                ->send();

            return;
        }

        $mediaPath = null;
        $mediaType = null;

        if ($this->image) {

            $mediaPath = $this->image
                ->store(
                    'social-posts',
                    'public'
                );

            $mediaType = 'image';
        }

        SocialPost::create([

            'organization_id' =>
                auth()->user()->organization_id,

            'campaign_id' =>
                $this->campaignId,

            'platform' =>
                $this->platform,

            'content' =>
                $this->generatedContent,

            'media_path' =>
                $mediaPath,

            'media_type' =>
                $mediaType,

            'scheduled_at' =>
                $this->scheduledAt,

            'status' =>
                $this->scheduledAt
                    ? 'Scheduled'
                    : 'Draft',

        ]);

        Notification::make()
            ->title('Draft Saved Successfully')
            ->success()
            ->send();
    }

    public function clearContent(): void
    {
        $this->generatedContent = '';

        $this->image = null;

        Notification::make()
            ->title('Content Cleared')
            ->success()
            ->send();
    }

    public function getCampaignsProperty()
    {
        return Campaign::where(
            'organization_id',
            auth()->user()->organization_id
        )
        ->orderBy('name')
        ->get();
    }
}

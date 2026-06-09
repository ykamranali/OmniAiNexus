<?php

namespace App\Filament\Admin\Pages;

use App\Models\Deal;
use Filament\Pages\Page;

class DealPipeline extends Page
{
    protected string $view = 'filament.admin.pages.deal-pipeline';

    public $newDeals;
    public $qualifiedDeals;
    public $proposalDeals;
    public $negotiationDeals;
    public $wonDeals;
    public $lostDeals;

    public function mount(): void
    {
        $query = Deal::with('lead');

        if (! auth()->user()->hasRole('Super Admin')) {
            $query->where(
                'organization_id',
                auth()->user()->organization_id
            );
        }

        $this->newDeals = (clone $query)
            ->where('stage', 'New')
            ->get();

        $this->qualifiedDeals = (clone $query)
            ->where('stage', 'Qualified')
            ->get();

        $this->proposalDeals = (clone $query)
            ->where('stage', 'Proposal')
            ->get();

        $this->negotiationDeals = (clone $query)
            ->where('stage', 'Negotiation')
            ->get();

        $this->wonDeals = (clone $query)
            ->where('stage', 'Won')
            ->get();

        $this->lostDeals = (clone $query)
            ->where('stage', 'Lost')
            ->get();
    }

    public static function getNavigationLabel(): string
    {
        return 'Deal Pipeline';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'CRM';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-briefcase';
    }
}

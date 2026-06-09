<?php

namespace App\Filament\Admin\Resources\SocialAccounts\Pages;

use App\Filament\Admin\Resources\SocialAccounts\SocialAccountResource;
use App\Support\PlanLimit;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListSocialAccounts extends ListRecords
{
    protected static string $resource = SocialAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [

            CreateAction::make()

                ->visible(function () {

                    return PlanLimit::canCreateSocialAccount();
                })

                ->before(function () {

                    if (! PlanLimit::canCreateSocialAccount()) {

                        Notification::make()
                            ->title('Social Account Limit Reached')
                            ->body(
                                'You have reached the maximum number of social accounts allowed by your subscription plan. Please upgrade your plan.'
                            )
                            ->danger()
                            ->persistent()
                            ->send();

                        $this->halt();
                    }
                }),

        ];
    }
}

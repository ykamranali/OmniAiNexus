<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use App\Support\PlanLimit;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [

            CreateAction::make()

                ->visible(function () {

                    return PlanLimit::canCreateUser();
                })

                ->before(function () {

                    if (! PlanLimit::canCreateUser()) {

                        Notification::make()
                            ->title('User Limit Reached')
                            ->body(
                                'You have reached the maximum number of users allowed by your subscription plan. Please upgrade your plan.'
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

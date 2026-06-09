<?php

namespace App\Filament\Admin\Resources\Leads\Pages;

use App\Filament\Admin\Resources\Leads\LeadResource;
use App\Models\Deal;
use App\Models\Task;
use App\Support\ActivityLogger;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewLead extends ViewRecord
{
    protected static string $resource = LeadResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Action::make('convertToDeal')
                ->label('Convert To Deal')
                ->icon('heroicon-o-briefcase')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {

                    $lead = $this->record;

                    if (
                        Deal::where('lead_id', $lead->id)
                            ->exists()
                    ) {
                        Notification::make()
                            ->title('This lead has already been converted.')
                            ->warning()
                            ->send();

                        return;
                    }

                    $deal = Deal::create([
                        'organization_id' => $lead->organization_id,
                        'lead_id' => $lead->id,
                        'title' => $lead->name,
                        'amount' => $lead->value ?? 0,
                        'stage' => 'New',
                        'notes' => $lead->notes,
                    ]);

                    Task::create([
                        'organization_id' => $lead->organization_id,
                        'lead_id' => $lead->id,
                        'deal_id' => $deal->id,
                        'user_id' => auth()->id(),

                        'title' => 'Follow Up - ' . $lead->name,

                        'description' =>
                            'Automatically created after lead conversion.',

                        'due_date' => now()->addDay(),

                        'priority' => 'Medium',

                        'status' => 'Pending',
                    ]);

                    $lead->update([
                        'status' => 'Won',
                    ]);

                    ActivityLogger::log(
                        'lead_converted',
                        'Lead "' . $lead->name .
                        '" converted to Deal "' .
                        $deal->title . '"',
                        $lead
                    );

                    Notification::make()
                        ->title('Lead converted successfully.')
                        ->success()
                        ->send();

                    return redirect(
                        route(
                            'filament.admin.resources.deals.view',
                            $deal
                        )
                    );
                }),

            EditAction::make(),
        ];
    }
}

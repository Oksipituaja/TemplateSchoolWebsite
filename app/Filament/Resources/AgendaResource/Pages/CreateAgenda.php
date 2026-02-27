<?php

namespace App\Filament\Resources\AgendaResource\Pages;

use App\Filament\Resources\AgendaResource;
use Carbon\Carbon;
use Filament\Resources\Pages\CreateRecord;

class CreateAgenda extends CreateRecord
{
    protected static string $resource = AgendaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (! empty($data['event_date'])) {
            if ($data['event_date'] instanceof Carbon) {
                $data['event_date'] = $data['event_date']->format('Y-m-d');
            }
        }

        if (! empty($data['event_time'])) {
            if ($data['event_time'] instanceof Carbon) {
                $data['event_time'] = $data['event_time']->format('H:i:s');
            } elseif (is_string($data['event_time'])) {
                $parts = explode(':', $data['event_time']);
                if (count($parts) >= 2) {
                    $data['event_time'] = sprintf('%02d:%02d:00', (int) $parts[0], (int) $parts[1]);
                }
            }
        }

        return $data;
    }
}

<?php

namespace App\Filament\Resources\RegistrationResource\Pages;

use App\Filament\Resources\RegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class ViewRegistration extends EditRecord
{
    protected static string $resource = RegistrationResource::class;

    protected static string $view = 'filament.resources.registration-resource.pages.view-registration';

    public function getTitle(): string
    {
        return 'View Registration';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

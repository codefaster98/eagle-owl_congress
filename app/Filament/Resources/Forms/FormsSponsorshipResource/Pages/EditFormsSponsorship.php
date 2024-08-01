<?php

namespace App\Filament\Resources\Forms\FormsSponsorshipResource\Pages;

use App\Filament\Resources\Forms\FormsSponsorshipResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormsSponsorship extends EditRecord
{
    protected static string $resource = FormsSponsorshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

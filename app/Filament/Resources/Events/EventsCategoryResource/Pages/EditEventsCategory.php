<?php

namespace App\Filament\Resources\Events\EventsCategoryResource\Pages;

use App\Filament\Resources\Events\EventsCategoryResource;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditEventsCategory extends EditRecord
{
    protected static string $resource = EventsCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data["name_ar"] = $data['name']['ar'];
        $data["name_en"] = $data['name']['en'];
        $data["description_ar"] = $data['description']['ar'];
        $data["description_en"] = $data['description']['en'];

        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['name']['ar'] = $data["name_ar"];
        $data['name']['en'] = $data["name_en"];
        $data['description']['ar'] = $data["description_ar"];
        $data['description']['en'] = $data["description_en"];
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name_ar')->required()->label("Arabic Name"),
                TextInput::make('name_en')->required()->label("English Name"),
                Textarea::make('description_ar')->required()->label("Arabic description"),
                Textarea::make('description_en')->required()->label("English description"),
            ]);
    }
}

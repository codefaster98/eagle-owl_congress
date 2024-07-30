<?php

namespace App\Filament\Resources\Events\EventsSpeakersResource\Pages;

use App\Filament\Resources\Events\EventsSpeakersResource;
use App\Services\events\EventsSpeakersServices;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateEventsSpeakers extends CreateRecord
{
    protected static string $resource = EventsSpeakersResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['code'] = EventsSpeakersServices::GenerateNewCode();
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
                FileUpload::make('avatar')->directory('Events_Speakers')->required()->label("Image"),
            ]);
    }
}

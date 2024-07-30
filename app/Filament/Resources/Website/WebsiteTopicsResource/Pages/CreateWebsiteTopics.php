<?php

namespace App\Filament\Resources\Website\WebsiteTopicsResource\Pages;

use App\Filament\Resources\Website\WebsiteTopicsResource;
use App\Services\website\WebsiteTopicsServices;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateWebsiteTopics extends CreateRecord
{
    protected static string $resource = WebsiteTopicsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['code'] = WebsiteTopicsServices::GenerateNewCode();
        $data['title']['ar'] = $data["title_ar"];
        $data['title']['en'] = $data["title_en"];
        $data['description']['ar'] = $data["description_ar"];
        $data['description']['en'] = $data["description_en"];

        // dd($data);
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title_ar')->required()->label("Arabic Title"),
                TextInput::make('title_en')->required()->label("English Title"),
                Textarea::make('description_ar')->required()->label("Arabic description"),
                Textarea::make('description_en')->required()->label("English description"),
                FileUpload::make('img')->directory('Topics')->required()->label("Image"),
            ]);
    }
}

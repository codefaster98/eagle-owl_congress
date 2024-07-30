<?php

namespace App\Filament\Resources\Website\WebsiteNewsResource\Pages;

use App\Filament\Resources\Website\WebsiteNewsResource;
use App\Services\website\WebsiteNewsServices;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateWebsiteNews extends CreateRecord
{
    protected static string $resource = WebsiteNewsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['code'] = WebsiteNewsServices::GenerateNewCode();
        $data['title']['ar'] = $data["title_ar"];
        $data['title']['en'] = $data["title_en"];
        $data['description']['ar'] = $data["description_ar"];
        $data['description']['en'] = $data["description_en"];
        $data['details']['ar'] = $data["details_ar"];
        $data['details']['en'] = $data["details_ar"];

        // dd($data);
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title_ar')->required()->label("Arabic Title"),
                TextInput::make('title_en')->required()->label("English Title"),
                TextInput::make('description_ar')->required()->label("Arabic Description"),
                TextInput::make('description_en')->required()->label("English Description"),
                Textarea::make('details_ar')->required()->label("Arabic details"),
                Textarea::make('details_en')->required()->label("English details"),
                FileUpload::make('img')->directory('News')->required()->label("English details"),
            ]);
    }
}

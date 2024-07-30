<?php

namespace App\Filament\Resources\Website\WebsiteTopicsResource\Pages;

use App\Filament\Resources\Website\WebsiteTopicsResource;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteTopics extends EditRecord
{
    protected static string $resource = WebsiteTopicsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data["title_ar"] = $data['title']['ar'];
        $data["title_en"] = $data['title']['en'];
        $data["description_ar"] = $data['description']['ar'];
        $data["description_en"] = $data['description']['en'];

        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['title']['ar'] = $data["title_ar"];
        $data['title']['en'] = $data["title_en"];
        $data['description']['ar'] = $data["description_ar"];
        $data['description']['en'] = $data["description_en"];
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

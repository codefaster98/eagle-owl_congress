<?php

namespace App\Filament\Resources\Website\WebsiteFaqsResource\Pages;

use App\Filament\Resources\Website\WebsiteFaqsResource;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteFaqs extends EditRecord
{
    protected static string $resource = WebsiteFaqsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data["question_ar"] = $data['question']['ar'];
        $data["question_en"] = $data['question']['en'];
        $data["answer_ar"] = $data['answer']['ar'];
        $data["answer_en"] = $data['answer']['en'];

        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {

        $data['question']['ar'] = $data["question_ar"];
        $data['question']['en'] = $data["question_en"];
        $data['answer']['ar'] = $data["answer_ar"];
        $data['answer']['en'] = $data["answer_en"];
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('question_ar')->required()->label("Arabic Question"),
                TextInput::make('question_en')->required()->label("English Question"),
                Textarea::make('answer_ar')->required()->label("Arabic Answer"),
                Textarea::make('answer_en')->required()->label("English Answer"),
            ]);
    }
}

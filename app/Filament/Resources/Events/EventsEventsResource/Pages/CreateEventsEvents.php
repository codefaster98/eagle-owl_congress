<?php

namespace App\Filament\Resources\Events\EventsEventsResource\Pages;

use App\Filament\Resources\Events\EventsEventsResource;
use App\Models\events\EventsCategoryM;
use App\Services\events\EventsEventsServices;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateEventsEvents extends CreateRecord
{
    protected static string $resource = EventsEventsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['code'] = EventsEventsServices::GenerateNewCode();
        $data['name']['ar'] = $data["name_ar"];
        $data['name']['en'] = $data["name_en"];
        $data['short_details']['ar'] = $data["short_details_ar"];
        $data['short_details']['en'] = $data["short_details_en"];
        $data['long_details']['ar'] = $data["long_details_ar"];
        $data['long_details']['en'] = $data["long_details_en"];
        // dd($data);
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')->required()->label("event category")->options(EventsCategoryM::all()->pluck('name.en', 'id'))->searchable(),
                DatePicker::make("date")->required()->after("today")->label("Event Date")->format('Y-m-d')->native(false)->displayFormat('Y-m-d'),
                TimePicker::make("from_time")->required()->label("From Time")->format('H:i')->native(false)->displayFormat('H:i'),
                TimePicker::make("to_time")->required()->after("from_time")->label("To Time")->format('H:i')->native(false)->displayFormat('H:i'),
                TextInput::make('name_ar')->required()->label("Arabic Name"),
                TextInput::make('name_en')->required()->label("English Name"),
                Textarea::make('short_details_ar')->required()->label("Arabic short details"),
                Textarea::make('short_details_en')->required()->label("English short details"),
                Textarea::make('long_details_ar')->required()->label("Arabic long details"),
                Textarea::make('long_details_en')->required()->label("English long details"),
            ]);
    }
}

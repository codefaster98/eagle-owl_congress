<?php

namespace App\Filament\Resources\Events\EventsEventsResource\Pages;

use App\Filament\Resources\Events\EventsEventsResource;
use App\Models\events\EventsCategoryM;
use App\Models\events\EventsEventsSpeakersM;
use App\Models\events\EventsEventsSponsorsM;
use App\Models\events\EventsSpeakersM;
use App\Models\events\EventsSponsorsM;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditEventsEvents extends EditRecord
{
    protected static string $resource = EventsEventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    /*
      'code',
        'category_id',
        'name',
        'short_details',
        'long_details',
        'date',
        'from_time',
        'to_time',
    */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data["name_ar"] = $data['name']['ar'];
        $data["name_en"] = $data['name']['en'];
        $data["short_details_ar"] = $data['short_details']['ar'];
        $data["short_details_en"] = $data['short_details']['en'];
        $data["long_details_ar"] = $data['long_details']['ar'];
        $data["long_details_en"] = $data['long_details']['en'];
        // $data["events_speakers"] = $data['long_details']['en'];
        $record =  static::getModel()::where('code', $data["code"])->firstOrFail();
        $data["events_speakers"] = $record->Speakers()->pluck('speaker_id')->toArray();
        $data["events_sponsors"] = $record->Sponsors()->pluck('sponsors_id')->toArray();
        // dd($record->Speakers()->pluck('speaker_id')->toArray());
        // dd($data);
        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['name']['ar'] = $data["name_ar"];
        $data['name']['en'] = $data["name_en"];
        $data['short_details']['ar'] = $data["short_details_ar"];
        $data['short_details']['en'] = $data["short_details_en"];
        $data['long_details']['ar'] = $data["long_details_ar"];
        $data['long_details']['en'] = $data["long_details_en"];
        return $data;
    }
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        //insert the main record
        $record->update($data);
        // delete all relation not in new update
        EventsEventsSpeakersM::where('event_id', $record->id)->whereNotIn('speaker_id', $data["events_speakers"] ?? [])->delete();
        foreach ($data["events_speakers"] ?? [] as $events_speaker) {
            // check if relation exists
            if (!EventsEventsSpeakersM::where(['speaker_id' => $events_speaker, "event_id" => $record->id])->exists()) {
                // Create a relation 
                $event_speaker = new EventsEventsSpeakersM();
                $event_speaker->speaker_id = $events_speaker;
                $event_speaker->event_id = $record->id;
                // Save the relation data
                $event_speaker->save();
            }
        }
        // delete all relation not in new update
        EventsEventsSponsorsM::where('event_id', $record->id)->whereNotIn('sponsors_id', $data["events_sponsors"] ?? [])->delete();

        foreach ($data["events_sponsors"] ?? [] as $events_sponsors) {
            // check if relation exists
            if (!EventsEventsSponsorsM::where(['sponsors_id' => $events_sponsors, "event_id" => $record->id])->exists()) {
                // Create a relation 
                $event_sponsors = new EventsEventsSponsorsM();
                $event_sponsors->sponsors_id = $events_sponsors;
                $event_sponsors->event_id = $record->id;
                // Save the relation data
                $event_sponsors->save();
            }
        }
        return $record;
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
                Select::make('events_sponsors')->required()->label("events sponsors")->multiple()->options(EventsSponsorsM::all()->pluck('first_name.en', 'id'))->searchable(),
                Select::make('events_speakers')->multiple()
                    ->required()->label("events speakers")->options(EventsSpeakersM::all()->pluck('name.en', 'id'))->searchable(),

            ]);
    }
}

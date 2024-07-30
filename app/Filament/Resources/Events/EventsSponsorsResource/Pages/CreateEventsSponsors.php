<?php

namespace App\Filament\Resources\Events\EventsSponsorsResource\Pages;

use App\Filament\Resources\Events\EventsSponsorsResource;
use App\Models\users\UsersUsersM;
use App\Services\events\EventsSponsorsServices;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateEventsSponsors extends CreateRecord
{
    protected static string $resource = EventsSponsorsResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['code'] = EventsSponsorsServices::GenerateNewCode();
        $data['title']['ar'] = $data["title_ar"];
        $data['title']['en'] = $data["title_en"];
        $data['first_name']['ar'] = $data["first_name_ar"];
        $data['first_name']['en'] = $data["first_name_en"];
        $data['last_name']['ar'] = $data["last_name_ar"];
        $data['last_name']['en'] = $data["last_name_en"];
        $data['job_position']['ar'] = $data["job_position_ar"];
        $data['job_position']['en'] = $data["job_position_en"];
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->options(UsersUsersM::all()->pluck('email', 'id'))
                    ->searchable()
                    ->columnSpan(2),
                TextInput::make('title_ar')->required()->label("Arabic Title"),
                TextInput::make('title_en')->required()->label("English Title"),
                TextInput::make('first_name_ar')->required()->label("Arabic first name"),
                TextInput::make('first_name_en')->required()->label("English first name"),
                TextInput::make('last_name_ar')->required()->label("Arabic last name"),
                TextInput::make('last_name_en')->required()->label("English last name"),
                TextInput::make('job_position_ar')->required()->label("Arabic job position"),
                TextInput::make('job_position_en')->required()->label("English job position"),
                TextInput::make('email')->required()->email()->label("email"),
                TextInput::make('phone_number_code')->required()->label("phone number code"),
                TextInput::make('phone_number')->required()->label("phone number"),
                TextInput::make('country')->required()->label("country"),
                TextInput::make('city')->required()->label("city"),
                TextInput::make('address_line_1')->required()->label("address line 1"),
                TextInput::make('address_line_2')->label("address line 2"),
                TextInput::make('post_code')->label("post code"),
                FileUpload::make('img')->directory('Events_Sponsors')->required()->label("Image"),
            ]);
    }
    // 6RF2ZY2
    // I5-9300H
}

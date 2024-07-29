<?php

namespace App\Filament\Resources\Users\UsersUsersResource\Pages;

use App\Filament\Resources\Users\UsersUsersResource;
use Filament\Actions;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditUsersUsers extends EditRecord
{
    protected static string $resource = UsersUsersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // // dd($data["list_en"]);
        // foreach ($data["list_en"] ?? [] as $keyen => $en) {
        //     $data["list"][$keyen]["en"] = $en;
        // }
        // foreach ($data["list_ar"] ?? [] as $keyar => $ar) {
        //     $data["list"][$keyar]["ar"] = $ar;
        // }
        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {

        // // $data['code'] = MembershipsMembershipsServices::GenerateNewCode();
        // foreach ($data["list"] ?? [] as $key => $val) {
        //     if ($data["list"][$key]["ar"]) {
        //         $data["list_ar"][] = $data["list"][$key]["ar"];
        //     }
        //     if ($data["list"][$key]["en"]) {
        //         $data["list_en"][] = $data["list"][$key]["en"];
        //     }
        // }
        // // dd($data);
        return $data;
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // 'code',
                TextInput::make('title')->required()->label("title"),
                TextInput::make('first_name')->required()->label("first name"),
                TextInput::make('last_name')->required()->label("last name"),
                TextInput::make('job_position')->label("job position"),
                TextInput::make('email')->email()->unique()->label("email"),
                TextInput::make('password')->password()->label("password"),
                TextInput::make('phone_number_code')->label("phone number code"),
                TextInput::make('phone_number')->label("phone_number"),
                TextInput::make('country')->required()->label("country"),
                TextInput::make('city')->required()->label("city"),
                TextInput::make('address_line_1')->required()->label("address line 1"),
                TextInput::make('address_line_2')->label("address line 2"),
                TextInput::make('post_code')->label("post code"),

            ]);
    }
}

<?php

namespace App\Filament\Resources\Users\UsersUsersResource\Pages;

use App\Filament\Resources\Users\UsersUsersResource;
use App\Services\users\UsersUsersServices;
use Filament\Actions;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateUsersUsers extends CreateRecord
{
    protected static string $resource = UsersUsersResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['code'] = UsersUsersServices::GenerateNewCode();
        // dd($data);
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

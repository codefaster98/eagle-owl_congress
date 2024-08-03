<?php

namespace App\Http\Requests\events_events;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class EventsEventsCheckSubscribeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    protected function prepareForValidation(): void
    {
        $this->merge([
            // "user" => $this->route("user"),
            // "event" => $this->route("event"),
        ]);
    }
    public function rules(): array
    {
        return [
            'user' => "required|exists:users_users,code",
            'event' => "required|exists:events_events,code",
        ];
    }

    public function attributes(): array
    {
        return [];
    }
    public function messages(): array
    {
        return [];
    }
}

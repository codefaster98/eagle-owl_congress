<?php

namespace App\Http\Requests\events_events;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class EventsEventsGetAllDatesRequest extends FormRequest
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
            "limit" => is_null($this->limit) ? 50 : (int) $this->limit,
        ]);
    }
    public function rules(): array
    { 
        return [
            'limit' => "required|integer",
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

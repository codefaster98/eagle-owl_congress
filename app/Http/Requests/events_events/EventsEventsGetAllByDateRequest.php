<?php

namespace App\Http\Requests\events_events;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class EventsEventsGetAllByDateRequest extends FormRequest
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
            "random" => is_null($this->random) || !in_array($this->random, ["yes", "no"]) ? false : ($this->random == "yes" ? true : false),
            "date" => is_null($this->date) ? config("app.date.now")->format("Y-m-d") : $this->date,

        ]);
    }
    public function rules(): array
    {
        return [
            'limit' => "required|integer",
            'random' => "required|boolean",
            'date' => "required|date_format:Y-m-d",

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

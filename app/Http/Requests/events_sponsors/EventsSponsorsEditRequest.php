<?php

namespace App\Http\Requests\events_sponsors;

use App\Models\events\EventsSponsorsM;
use App\Services\events\EventsSponsorsServices;
use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class EventsSponsorsEditRequest extends FormRequest
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
            "code" => $this->route("sponsor_code"),
            "user_id" => auth("api")->user()?->id,
            // array keys
            'title' => ["ar" => $this->title_ar, "en" => $this->title_en],
            'first_name' => ["ar" => $this->first_name_ar, "en" => $this->first_name_en],
            'last_name' => ["ar" => $this->last_name_ar, "en" => $this->last_name_en],
            'job_position' => ["ar" => $this->job_position_ar, "en" => $this->job_position_en],

        ]);
    }
    public function rules(): array
    {

        $id = EventsSponsorsM::where('code', $this->route("sponsor_code"))->first()?->id;
        return [
            'code' => "required|unique:events_sponsors,code," . $id,
            'user_id' => "required|exists:users_users,id",
            // title
            'title' => "required|array|min:2|max:2", // merge
            'title.ar' => "required|max:5",
            'title.en' => "required|max:5",
            // first_name
            'first_name' => "required|array|min:2|max:2", // merge
            'first_name.ar' => "required|max:50",
            'first_name.en' => "required|max:50",
            // last_name
            'last_name' => "required|array|min:2|max:2", // merge
            'last_name.ar' => "required|max:50",
            'last_name.en' => "required|max:50",
            // last_name
            'job_position' => "required|array|min:2|max:2", // merge
            'job_position.ar' => "required|max:50",
            'job_position.en' => "required|max:50",
            // 'title' => "required|min:2|max:5",
            // 'first_name' => "required|min:3|max:50",
            // 'last_name' => "required|min:3|max:50",
            // 'job_position' => "required|min:3|max:50",
            'email' => "required|email|unique:events_sponsors,email," . $id,
            'img' => "nullable|file|mimes:png,jpg",
            'phone_number_code' => "nullable|min_digits:2|max_digits:5",
            'phone_number' => "nullable|min_digits:8|max_digits:14",
            'country' => "required|min:3|max:50",
            'city' => "required|min:3|max:50",
            'address_line_1' => "required|max:200",
            'address_line_2' => "nullable|max:200",
            'post_code' => "nullable|max:10",


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

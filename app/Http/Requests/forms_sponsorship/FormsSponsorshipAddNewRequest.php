<?php

namespace App\Http\Requests\forms_sponsorship;

use App\Services\forms\FormsSponsorshipServices;
use Illuminate\Foundation\Http\FormRequest;

class FormsSponsorshipAddNewRequest extends FormRequest
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
            // "code" => FormsSponsorshipServices::GenerateNewCode(),
            // "user_id" => auth("api")->user()?->id,
            // // array keys
            // 'title' => ["ar" => $this->title_ar, "en" => $this->title_en],
            // 'first_name' => ["ar" => $this->first_name_ar, "en" => $this->first_name_en],
            // 'last_name' => ["ar" => $this->last_name_ar, "en" => $this->last_name_en],
            // 'job_position' => ["ar" => $this->job_position_ar, "en" => $this->job_position_en],

        ]);
    }
    public function rules(): array
    {


        return [
            'name' => "required|min:3|max:100",
            'message' => "required|min:10|max:200",
            'email' => "required|email",
            'phone_code' => "required|min_digits:2|max_digits:4",
            'phone' => "required|min_digits:8|max_digits:14",
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

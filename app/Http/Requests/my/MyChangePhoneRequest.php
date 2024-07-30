<?php

namespace App\Http\Requests\my;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;

class MyChangePhoneRequest extends FormRequest
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
            "user" => auth("api")->user()?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            "user" => "required|exists:users_users,id",
            'phone_number_code' => "required|min:2|max:3",
            'phone_number' => "required|min:8|max:14",

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

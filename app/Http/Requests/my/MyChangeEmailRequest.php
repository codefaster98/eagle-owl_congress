<?php

namespace App\Http\Requests\my;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;

class MyChangeEmailRequest extends FormRequest
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
            "verify_token" => rand(123652, 986412),
            'active_type' => UsersUsersServices::DIS_ACTIVE_BY_VERIFY_MAIL,
            "active" => false,
        ]);
    }

    public function rules(): array
    {
        return [
            "user" => "required|exists:users_users,id",
            'email' => "required|email|unique:users_users,email",
            'verify_token' => "required|integer",
            'active_type' => "required|min:3|max:25",
            "active" => "required|boolean",

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

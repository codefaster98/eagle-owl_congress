<?php

namespace App\Http\Requests\my;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class MyChangePasswordRequest extends FormRequest
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
            "user" => auth("api")->user()?->id
        ]);
    }

    public function rules(): array
    {
        return [
            "user" => "required|exists:users_users,id",
            "current_password" => "required|current_password:api",
            "password" => "required|min:8|max:25|confirmed|different:current_password",
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

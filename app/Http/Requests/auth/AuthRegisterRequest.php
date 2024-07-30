<?php

namespace App\Http\Requests\auth;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class AuthRegisterRequest extends FormRequest
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
            'code' => UsersUsersServices::GenerateNewCode(),
            "verify_token" => rand(123652, 986412),
            'active_type' => UsersUsersServices::DIS_ACTIVE_BY_VERIFY_MAIL,
            "active" => false,
        ]);
    }

    public function rules(): array
    {
        return [
            "code" => "required|unique:users_users,code",
            "email" => "required|email|unique:users_users,email",
            "password" => "required|min:8|max:30|confirmed",
            'title' => "required|min:2|max:5",
            'first_name' => "required|min:3|max:25",
            'last_name' => "required|min:3|max:25",
            'job_position' => "nullable|min:3|max:25",
            'phone_number_code' => "nullable|min:2|max:3",
            'phone_number' => "nullable|min:8|max:14",
            'country' => "required|min:3|max:25",
            'city' => "required|min:3|max:25",
            'address_line_1' => "required|min:3|max:150",
            'address_line_2' => "nullable|min:3|max:150",
            'post_code' => "nullable|min:3|max:10",
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

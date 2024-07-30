<?php

namespace App\Http\Requests\my;

use App\Services\users\UsersUsersServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Number;

class MyChangeNameRequest extends FormRequest
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
            'first_name' => "required|min:3|max:25",
            'last_name' => "required|min:3|max:25",
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

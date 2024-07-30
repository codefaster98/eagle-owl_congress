<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\my\MyChangeEmailRequest;
use App\Http\Requests\my\MyChangeNameRequest;
use App\Http\Requests\my\MyChangePasswordRequest;
use App\Http\Requests\my\MyChangePhoneRequest;
use App\Services\system\SystemApiResponseServices;
use App\Services\users\UsersUsersServices;
use Illuminate\Support\Facades\DB;

class my extends Controller
{
    public function Profile()
    {
        try {
            return  SystemApiResponseServices::ReturnSuccess(
                ["user" => UsersUsersServices::Auth()],
                null,
                null
            );
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnError(
                9800,
                null,
                $th->getMessage(),
            );
        }
    }
    public function ChangePassword(MyChangePasswordRequest $request)
    {
        try {
            // return $request->validated();
            $change_password = UsersUsersServices::ChangePassword($request->validated());
            if ($change_password) {
                return  SystemApiResponseServices::ReturnSuccess(
                    [],
                    __("return_messages.user_users.ChangePasswordSucc"),
                    null
                );
            } else {
                return  SystemApiResponseServices::ReturnFailed(
                    [],
                    __("return_messages.user_users.ChangePasswordFailed"),
                    null
                );
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnError(
                9800,
                null,
                $th->getMessage(),
            );
        }
    }
    public function ChangeName(MyChangeNameRequest $request)
    {
        try {
            // return $request->validated();
            $change_name = UsersUsersServices::ChangeName($request->validated());
            if ($change_name) {
                return  SystemApiResponseServices::ReturnSuccess(
                    [],
                    __("return_messages.user_users.ChangeNameSucc"),
                    null
                );
            } else {
                return  SystemApiResponseServices::ReturnFailed(
                    [],
                    __("return_messages.user_users.ChangeNameFailed"),
                    null
                );
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnError(
                9800,
                null,
                $th->getMessage(),
            );
        }
    }
    public function ChangeEmail(MyChangeEmailRequest $request)
    {
        try {
            // return $request->validated();
            $change_name = UsersUsersServices::ChangeEmail($request->validated());
            if ($change_name) {
                return  SystemApiResponseServices::ReturnSuccess(
                    [],
                    __("return_messages.user_users.ChangeEmailSucc"),
                    null
                );
            } else {
                return  SystemApiResponseServices::ReturnFailed(
                    [],
                    __("return_messages.user_users.ChangeEmailFailed"),
                    null
                );
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnError(
                9800,
                null,
                $th->getMessage(),
            );
        }
    }
    public function ChangePhone(MyChangePhoneRequest $request)
    {
        try {
            // return $request->validated();
            $change_name = UsersUsersServices::ChangePhone($request->validated());
            if ($change_name) {
                return  SystemApiResponseServices::ReturnSuccess(
                    [],
                    __("return_messages.user_users.ChangePhoneSucc"),
                    null
                );
            } else {
                return  SystemApiResponseServices::ReturnFailed(
                    [],
                    __("return_messages.user_users.ChangePhoneFailed"),
                    null
                );
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnError(
                9800,
                null,
                $th->getMessage(),
            );
        }
    }
}

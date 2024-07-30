<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\{
    AuthRegisterRequest,
    AuthLoginRequest
};
use App\Services\system\SystemApiResponseServices;
use App\Services\users\UsersUsersServices;
use Illuminate\Support\Facades\DB;

class auth extends Controller
{
    // 
    public function Register(AuthRegisterRequest $request)
    {
        try {
            $user = DB::transaction(function () use ($request) {
                // add user to database
                return UsersUsersServices::Registration($request->validated());
            });
            // return response
            if ($user) {
                return  SystemApiResponseServices::ReturnSuccess(
                    ["user" => $user],
                    __("return_messages.user_users.RegisterSucc"),
                    null
                );
            } else {
                return  SystemApiResponseServices::ReturnFailed(
                    [],
                    __("return_messages.user_users.RegisterFailed"),
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
    public function Login(AuthLoginRequest $request)
    {
        try {
            $token = DB::transaction(function () use ($request) {
                // add user to database
                return UsersUsersServices::Login($request->email, $request->password);
            });
            // return response
            if ($token) {
                return  SystemApiResponseServices::ReturnSuccess(
                    $token,
                    __("return_messages.user_users.LoginSucc"),
                    null
                );
            } else {
                return  SystemApiResponseServices::ReturnFailed(
                    [],
                    __("return_messages.user_users.LoginFailed"),
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
    public function Logout()
    {
        try {
            // dd(UsersUsersServices::Logout());
            \Tymon\JWTAuth\Facades\JWTAuth::invalidate(\Tymon\JWTAuth\Facades\JWTAuth::getToken());
            return  SystemApiResponseServices::ReturnSuccess(
                [],
                __("return_messages.user_users.LogoutSucc"),
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
  



    // public function Verify(AuthVerifyRequest $request)
    // {
    //     try {
    //         $token = DB::transaction(function () use ($request) {
    //             // add user to database
    //             return UsersUsersServices::Verify($request->user_code, $request->otp);
    //         });
    //         // return response
    //         if ($token) {
    //             return  SystemApiResponseServices::ReturnSuccess(
    //                 [],
    //                 __("return_messages.user_users.VerifySucc"),
    //                 null
    //             );
    //         } else {
    //             return  SystemApiResponseServices::ReturnFailed(
    //                 [],
    //                 __("return_messages.user_users.VerifyFailed"),
    //                 null
    //             );
    //         }
    //     } catch (\Throwable $th) {
    //         return SystemApiResponseServices::ReturnError(
    //             9800,
    //             null,
    //             $th->getMessage(),
    //         );
    //     }
    // }
}

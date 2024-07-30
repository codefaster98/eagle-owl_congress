<?php

namespace App\Services\users;

use App\Mail\users\VerifyCodeEmail;
use App\Models\Users\UsersUsersM;
use Illuminate\Support\Facades\Mail;

class UsersUsersServices
{
    const DIS_ACTIVE_BY_VERIFY_MAIL = "mail";
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (UsersUsersM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
    static public function Registration(array $data)
    {
        $user = UsersUsersM::create($data);
        // send verify mail
        Mail::to($user->email)->send(new VerifyCodeEmail($user->verify_token));
        // return $user
        return $user;
    }
    static public function Login($email, $password)
    {
        $token = auth("api")->attempt([
            "email" => $email,
            "password" => $password,
        ]);
        if ($token) {
            return [
                "token" => $token,
                "type" => "Bearer",
            ];
        } else {
            return null;
        }
    }
    static public function Logout()
    {
        return auth("api")->logout();
    }
    static public function Auth()
    {
        return auth("api")->user();
    }
}

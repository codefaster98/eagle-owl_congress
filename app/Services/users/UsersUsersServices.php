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
    static public function ChangePassword(array $data)
    {
        $user = UsersUsersM::where('id', $data['user'])->first();
        $user->password = $data["password"];
        return  $user->save();
        // // send verify mail
        // Mail::to($user->email)->send(new VerifyCodeEmail($user->verify_token));
        // return $user
        // return $user;
    }
    static public function ChangeName(array $data)
    {
        $user = UsersUsersM::where('id', $data['user'])->first();
        $user->first_name = $data["first_name"];
        $user->last_name = $data["last_name"];
        return  $user->save();
        // // send verify mail
        // Mail::to($user->email)->send(new VerifyCodeEmail($user->verify_token));
        // return $user
        // return $user;
    }
    static public function ChangePhone(array $data)
    {
        $user = UsersUsersM::where('id', $data['user'])->first();
        $user->phone_number_code = $data["phone_number_code"];
        $user->phone_number = $data["phone_number"];
        return  $user->save();
    }
    static public function ChangeEmail(array $data)
    {
        $user = UsersUsersM::where('id', $data['user'])->first();
        $user->email = $data["email"];
        $user->verify_token = $data["verify_token"];
        $user->active_type = $data["active_type"];
        $user->active = $data["active"];
        $action = $user->save();
        // send verify mail
        Mail::to($user->email)->send(new VerifyCodeEmail($user->verify_token));
        return $action;
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

<?php

namespace App\Services\users;

use App\Models\Users\UsersUsersM;

class UsersUsersServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (UsersUsersM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
}

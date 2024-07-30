<?php

namespace App\Models\users;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersAdminsM extends Authenticatable
{
    protected $table = "users_admins";
    protected $fillable = [
        'email',
        'password',
        'name',
        'rules',
    ];
    protected $hidden = [
        'id',
        'password',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}

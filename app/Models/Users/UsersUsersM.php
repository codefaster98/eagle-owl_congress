<?php

namespace App\Models\users;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UsersUsersM extends Authenticatable implements JWTSubject
{
    protected $table = "users_users";
    protected $fillable = [
        'id',
        'code',
        'title',
        'first_name',
        'last_name',
        'job_position',
        'email',
        'password',
        'phone_number_code',
        'phone_number',
        'country',
        'city',
        'address_line_1',
        'address_line_2',
        'post_code',
        'verify_token',
        'active_type',
        'active',
    ];
    protected $hidden = [
        'id',
        'password',
        'verify_token',
        'active_type',
        'active',
        'remember_token',
        'created_at',
        'updated_at',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'active' => 'boolean',
        ];
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}

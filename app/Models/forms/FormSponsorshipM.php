<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Model;

class FormSponsorshipM extends Model
{
    protected $table = "form_sponsorship";
    protected $fillable = [
        'name',
        'email',
        'phone_code', 
        'phone',
        'message',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected function casts(): array
    {
        return [
            // 'title' => 'array',
            // 'first_name' => 'array',
            // 'last_name' => 'array',
            // 'job_position' => 'array',
        ];
    }
}

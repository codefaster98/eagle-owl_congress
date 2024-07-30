<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsSponsorsM extends Model
{
    protected $table = "events_sponsors";
    protected $fillable = [
        'code',
        'user_id',
        'title',
        'first_name',
        'last_name',
        'job_position',
        'email',
        'img',
        'phone_number_code',
        'phone_number',
        'country',
        'city',
        'address_line_1',
        'address_line_2',
        'post_code',
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
            'title' => 'array',
            'first_name' => 'array',
            'last_name' => 'array',
            'job_position' => 'array',
        ];
    }
}

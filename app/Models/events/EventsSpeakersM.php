<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsSpeakersM extends Model
{
    protected $table = "events_speakers";
    protected $fillable = [
        'code',
        'name',
        'description',
        'avatar',
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
            'name' => 'array',
            'description' => 'array',
        ];
    }
}

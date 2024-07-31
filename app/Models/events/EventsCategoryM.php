<?php

namespace App\Models\events;

use Illuminate\Database\Eloquent\Model;

class EventsCategoryM extends Model
{
    protected $table = "events_category";
    protected $fillable = [
        'code',
        'name',
        'description',
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

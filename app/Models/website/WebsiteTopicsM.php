<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Model;

class WebsiteTopicsM extends Model
{
    protected $table = "website_topics";
    protected $fillable = [
        'code',
        'img',
        'title',
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
            'title' => 'array',
            'description' => 'array',
        ];
    }
}

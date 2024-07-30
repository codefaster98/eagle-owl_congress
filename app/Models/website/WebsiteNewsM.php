<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Model;

class WebsiteNewsM extends Model
{
    protected $table = "website_news";
    protected $fillable = [
        'code',
        'title',
        'description',
        'details',
        'img',
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
            'details' => 'array',
        ];
    }
}

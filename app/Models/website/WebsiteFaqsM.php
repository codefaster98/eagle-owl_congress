<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Model;

class WebsiteFaqsM extends Model
{
    protected $table = "website_faqs";
    protected $fillable = [
        'code',
        'question',
        'answer',
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
            'question' => 'array',
            'answer' => 'array',
        ];
    }
}

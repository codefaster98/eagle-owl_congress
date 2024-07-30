<?php

namespace App\Services\website;

use App\Models\website\WebsiteNewsM;

class WebsiteNewsServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (WebsiteNewsM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
    static public function GetAllWithLimit(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return WebsiteNewsM::limit($limit)->with($Relations)->get();
        } else {
            return WebsiteNewsM::limit($limit)->get();
        }
    }
    static public function GetAllWithLimitAndRandom(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return WebsiteNewsM::inRandomOrder()->limit($limit)->with($Relations)->get();
        } else {
            return WebsiteNewsM::inRandomOrder()->limit($limit)->get();
        }
    }
}

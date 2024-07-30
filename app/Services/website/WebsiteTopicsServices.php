<?php

namespace App\Services\website;

use App\Models\website\WebsiteTopicsM;

class WebsiteTopicsServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (WebsiteTopicsM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
    static public function GetAllWithLimit(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return WebsiteTopicsM::limit($limit)->with($Relations)->get();
        } else {
            return WebsiteTopicsM::limit($limit)->get();
        }
    }
    static public function GetAllWithLimitAndRandom(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return WebsiteTopicsM::inRandomOrder()->limit($limit)->with($Relations)->get();
        } else {
            return WebsiteTopicsM::inRandomOrder()->limit($limit)->get();
        }
    }
}

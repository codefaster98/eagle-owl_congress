<?php

namespace App\Services\website;

use App\Models\website\WebsiteFaqsM;

class WebsiteFaqsServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (WebsiteFaqsM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
    static public function GetAllWithLimit(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return WebsiteFaqsM::limit($limit)->with($Relations)->get();
        } else {
            return WebsiteFaqsM::limit($limit)->get();
        }
    }
    static public function GetAllWithLimitAndRandom(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return WebsiteFaqsM::inRandomOrder()->limit($limit)->with($Relations)->get();
        } else {
            return WebsiteFaqsM::inRandomOrder()->limit($limit)->get();
        }
    }
}

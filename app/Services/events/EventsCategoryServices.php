<?php

namespace App\Services\events;

use App\Models\events\EventsCategoryM;

class EventsCategoryServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (EventsCategoryM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
}

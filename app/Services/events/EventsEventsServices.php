<?php

namespace App\Services\events;

use App\Models\events\EventsEventsM;

class EventsEventsServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (EventsEventsM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
}

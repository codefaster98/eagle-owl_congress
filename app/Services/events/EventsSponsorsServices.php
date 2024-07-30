<?php

namespace App\Services\events;

use App\Models\events\EventsSponsorsM;

class EventsSponsorsServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (EventsSponsorsM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
    static public function GetAllWithLimit(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return EventsSponsorsM::limit($limit)->with($Relations)->get();
        } else {
            return EventsSponsorsM::limit($limit)->get();
        }
    }
    static public function GetAllWithLimitAndRandom(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return EventsSponsorsM::inRandomOrder()->limit($limit)->with($Relations)->get();
        } else {
            return EventsSponsorsM::inRandomOrder()->limit($limit)->get();
        }
    }
}

<?php

namespace App\Services\events;

use App\Models\events\EventsSpeakersM;

class EventsSpeakersServices
{
    static public function GenerateNewCode()
    {
        $code = \Illuminate\Support\Str::random(5);
        if (EventsSpeakersM::where('code', $code)->exists()) {
            return Self::GenerateNewCode();
        } else {
            return $code;
        }
    }
    static public function GetAllWithLimit(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return EventsSpeakersM::limit($limit)->with($Relations)->get();
        } else {
            return EventsSpeakersM::limit($limit)->get();
        }
    }
    static public function GetAllWithLimitAndRandom(array|null $Relations, int $limit)
    {
        if ($Relations) {
            return EventsSpeakersM::inRandomOrder()->limit($limit)->with($Relations)->get();
        } else {
            return EventsSpeakersM::inRandomOrder()->limit($limit)->get();
        }
    }
}

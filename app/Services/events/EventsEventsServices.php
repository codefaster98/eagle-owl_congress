<?php

namespace App\Services\events;

use App\Models\events\EventsEventsM;
use App\Models\events\EventsEventsUsersM;
use App\Models\users\UsersUsersM;
use Illuminate\Support\Facades\DB;

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
    static public function GetAllDates($limit)
    {
        return  EventsEventsM::select('date', DB::raw('count(*) as total_events'))->groupBy('date')->limit($limit)->get();
    }
    static public function GetByCode($code, array|null $Relations)
    {
        if ($Relations) {
            return EventsEventsM::where('code', $code)->withCount('Speakers AS total_speakers')->withCount('Sponsors AS total_sponsors')->with($Relations)->get();
        } else {
            return EventsEventsM::where('code', $code)->withCount('Speakers AS total_speakers')->withCount('Sponsors AS total_sponsors')->get();
        }
    }
    static public function GetAllWithLimit($date, array|null $Relations, int $limit)
    {
        if ($Relations) {
            return EventsEventsM::whereDate('date', '=', $date)->limit($limit)->withCount('Speakers AS total_speakers')->withCount('Sponsors AS total_sponsors')->with($Relations)->get();
        } else {
            return EventsEventsM::whereDate('date', '=', $date)->limit($limit)->withCount('Speakers AS total_speakers')->withCount('Sponsors AS total_sponsors')->get();
        }
    }
    static public function GetAllWithLimitAndRandom($date, array|null $Relations, int $limit)
    {
        if ($Relations) {
            return EventsEventsM::whereDate('date', '=', $date)->inRandomOrder()->limit($limit)->withCount('Speakers AS total_speakers')->withCount('Sponsors AS total_sponsors')->with($Relations)->get();
        } else {
            return EventsEventsM::whereDate('date', '=', $date)->inRandomOrder()->withCount('Speakers AS total_speakers')->withCount('Sponsors AS total_sponsors')->limit($limit)->get();
        }
    }
    //
    static public function CheckSubscribe($user_code, $event_code): bool
    {
        $user = UsersUsersM::where('code', $user_code)->first();
        $event = EventsEventsM::where('code', $event_code)->first();
        return EventsEventsUsersM::where([
            'event_id' => $event->id,
            'user_id' => $user->id,
        ])->exists();
    }
    static public function CheckSubscribeDetails($user_code, $event_code)
    {
        $user = UsersUsersM::where('code', $user_code)->first();
        $event = EventsEventsM::where('code', $event_code)->first();
        return EventsEventsUsersM::where([
            'event_id' => $event->id,
            'user_id' => $user->id,
        ])->first();
    }
    static public function Subscribe($user_id, $event_id)
    {
        // return EventsEventsUsersM::create([
        //     'event_id' => $event_id,
        //     'user_id' => $user_id,
        //     'date' => config("app.date.now"),
        //     'attend' => null,
        // ]);
    }
    static public function UnSubscribe($user_id, $event_id)
    {
        // return EventsEventsUsersM::where([
        //     'event_id' => $event_id,
        //     'user_id' => $user_id,
        // ])->delete();
    }
    static public function AllSubscribedEvents($user_id)
    {
        // return EventsEventsUsersM::where('user_id', $user_id)
        //     ->with(["Event"])
        //     ->get();
    }
}

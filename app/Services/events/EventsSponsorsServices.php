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
    static public function AddNew(array $data)
    {
        return EventsSponsorsM::create($data);
    }
    static public function GetByCode(array|null $Relations, $sponsor_code)
    {
        if ($Relations) {
            return EventsSponsorsM::where("code", $sponsor_code)->with($Relations)->first();
        } else {
            return EventsSponsorsM::where("code", $sponsor_code)->first();
        }
    }
    static public function Edit($sponsor_code, array $data)
    {
        // $data["img"] = "ll";
        return EventsSponsorsM::where("code", $sponsor_code)->first()->update($data);
    }
    static public function UploadImg($spon_code, $img)
    {
        $imageName = $spon_code . "." . $img->extension();
        return  $path = $img->storeAs('Events_Sponsors', $imageName);
        // return EventsSponsorsM::where('code')->update(['img' => $path]);
    }
    static public function GetAllWithLimitForUser($user_id, array|null $Relations, int $limit)
    {

        if ($Relations) {
            return EventsSponsorsM::where('user_id', $user_id)->limit($limit)->with($Relations)->get();
        } else {
            return EventsSponsorsM::where('user_id', $user_id)->limit($limit)->get();
        }
    }
    static public function GetAllWithLimitAndRandomForUser($user_id, array|null $Relations, int $limit)
    {

        if ($Relations) {
            return EventsSponsorsM::where('user_id', $user_id)->inRandomOrder()->limit($limit)->with($Relations)->get();
        } else {
            return EventsSponsorsM::where('user_id', $user_id)->inRandomOrder()->limit($limit)->get();
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

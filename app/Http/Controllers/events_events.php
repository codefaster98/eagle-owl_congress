<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\events_events\{
    EventsEventsGetAllByDateRequest,
    EventsEventsGetAllDatesRequest,
    EventsEventsGetDetailsRequest
};
use App\Services\events\EventsEventsServices;
use App\Services\system\SystemApiResponseServices;

class events_events extends Controller
{
    // with out auth
    public function WithOutAuthAllDates(EventsEventsGetAllDatesRequest $request)
    {
        try {
            $events = EventsEventsServices::GetAllDates($request->limit);
            if ($events) {
                return SystemApiResponseServices::ReturnSuccess($events, $request->validated(), null);
            } else {
                return SystemApiResponseServices::ReturnFailed([], __("global.Null"), null);
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
    public function WithOutAuthAllByDate(EventsEventsGetAllByDateRequest $request)
    {
        // return $request->validated();
        try {
            if ($request->random) {
                $events = EventsEventsServices::GetAllWithLimitAndRandom($request->date, ["Category"], $request->limit);
            } else {
                $events = EventsEventsServices::GetAllWithLimit($request->date, ["Category"], $request->limit);
            }
            if ($events) {
                return SystemApiResponseServices::ReturnSuccess($events, $request->validated(), null);
            } else {
                return SystemApiResponseServices::ReturnFailed([], __("global.Null"), null);
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
    public function GetDetails(EventsEventsGetDetailsRequest $request)
    {
        // return $request->validated();
        try {
            $events = EventsEventsServices::GetByCode($request->code, ["Category"]);
            if ($events) {
                return SystemApiResponseServices::ReturnSuccess(["event" => $events], $request->validated(), null);
            } else {
                return SystemApiResponseServices::ReturnFailed([], __("global.Null"), null);
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
}

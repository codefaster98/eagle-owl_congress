<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\events_sponsors\EventsSponsorsAddNewRequest;
use App\Http\Requests\events_sponsors\EventsSponsorsEditRequest;
use App\Http\Requests\events_sponsors\EventsSponsorsGetAllMyRequest;
use App\Http\Requests\events_sponsors\EventsSponsorsGetAllRequest;
use App\Services\events\EventsSponsorsServices;
use App\Services\system\SystemApiResponseServices;
use Illuminate\Support\Facades\DB;

class events_events extends Controller
{
    // public function AllMy(EventsSponsorsGetAllMyRequest $request)
    // {
    //     // return $request->validated();
    //     try {
    //         if ($request->random) {
    //             $Faqs = EventsSponsorsServices::GetAllWithLimitAndRandomForUser($request->user, null, $request->limit);
    //         } else {
    //             $Faqs = EventsSponsorsServices::GetAllWithLimitForUser($request->user, null, $request->limit);
    //         }
    //         if ($Faqs) {
    //             return SystemApiResponseServices::ReturnSuccess($Faqs, $request->except(['user']), null);
    //         } else {
    //             return SystemApiResponseServices::ReturnFailed([], __("global.Null"), null);
    //         }
    //     } catch (\Throwable $th) {
    //         return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
    //     }
    // }
    // with out auth
    public function WithOutAuthAll(EventsSponsorsGetAllRequest $request)
    {
        // return $request->validated();
        try {
            if ($request->random) {
                $Faqs = EventsSponsorsServices::GetAllWithLimitAndRandom(null, $request->limit);
            } else {
                $Faqs = EventsSponsorsServices::GetAllWithLimit(null, $request->limit);
            }
            if ($Faqs) {
                return SystemApiResponseServices::ReturnSuccess($Faqs, $request->validated(), null);
            } else {
                return SystemApiResponseServices::ReturnFailed([], __("global.Null"), null);
            }
        } catch (\Throwable $th) {
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
}

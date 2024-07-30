<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\events_sponsors\EventsSponsorsGetAllRequest;
use App\Services\events\EventsSponsorsServices;
use App\Services\system\SystemApiResponseServices;

class events_sponsors extends Controller
{
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

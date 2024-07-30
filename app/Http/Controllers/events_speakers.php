<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\events_speakers\EventsSpeakersGetAllRequest;
use App\Services\events\EventsSpeakersServices;
use App\Services\system\SystemApiResponseServices;

class events_speakers extends Controller
{
    // with out auth
    public function WithOutAuthAll(EventsSpeakersGetAllRequest $request)
    {
        // return $request->validated();
        try {
            if ($request->random) {
                $Faqs = EventsSpeakersServices::GetAllWithLimitAndRandom(null, $request->limit);
            } else {
                $Faqs = EventsSpeakersServices::GetAllWithLimit(null, $request->limit);
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

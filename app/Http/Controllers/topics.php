<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\topics\TopicsGetAllRequest;
use App\Services\system\SystemApiResponseServices;
use App\Services\website\WebsiteTopicsServices;

class topics extends Controller
{
    // with out auth
    public function WithOutAuthAll(TopicsGetAllRequest $request)
    {
        // return $request->validated();
        try {
            if ($request->random) {
                $Faqs = WebsiteTopicsServices::GetAllWithLimitAndRandom(null, $request->limit);
            } else {
                $Faqs = WebsiteTopicsServices::GetAllWithLimit(null, $request->limit);
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

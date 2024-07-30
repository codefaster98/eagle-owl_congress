<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\news\NewsGetAllRequest;
use App\Services\system\SystemApiResponseServices;
use App\Services\website\WebsiteNewsServices;

class news extends Controller
{
    // with out auth
    public function WithOutAuthAll(NewsGetAllRequest $request)
    {
        // return $request->validated();
        try {
            if ($request->random) {
                $Faqs = WebsiteNewsServices::GetAllWithLimitAndRandom(null, $request->limit);
            } else {
                $Faqs = WebsiteNewsServices::GetAllWithLimit(null, $request->limit);
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

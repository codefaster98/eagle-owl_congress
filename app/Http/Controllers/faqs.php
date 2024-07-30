<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\faqs\FaqsGetAllRequest;
use App\Services\system\SystemApiResponseServices;
use App\Services\users\UsersUsersServices;
use App\Services\website\WebsiteFaqsServices;
use Illuminate\Support\Facades\DB;

class faqs extends Controller
{
    // with out auth
    public function WithOutAuthAll(FaqsGetAllRequest $request)
    {
        // return $request->validated();
        try {
            if ($request->random) {
                $Faqs = WebsiteFaqsServices::GetAllWithLimitAndRandom(null, $request->limit);
            } else {
                $Faqs = WebsiteFaqsServices::GetAllWithLimit(null, $request->limit);
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

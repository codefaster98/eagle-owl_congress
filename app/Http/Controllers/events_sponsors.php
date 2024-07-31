<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\events_sponsors\EventsSponsorsAddNewRequest;
use App\Http\Requests\events_sponsors\EventsSponsorsEditRequest;
use App\Http\Requests\events_sponsors\EventsSponsorsGetAllRequest;
use App\Services\events\EventsSponsorsServices;
use App\Services\system\SystemApiResponseServices;
use Illuminate\Support\Facades\DB;

class events_sponsors extends Controller
{
    public function AddNew(EventsSponsorsAddNewRequest $request)
    {

        // return $request->validated();
        try {
            $spon = DB::transaction(function () use ($request) {
                $path =   EventsSponsorsServices::UploadImg($request->code, $request->file("img"));
                $request->merge(['img' => $path]);
                $spon = EventsSponsorsServices::AddNew($request->validated());
                return $spon;
            });
            if ($spon) {
                return SystemApiResponseServices::ReturnSuccess(
                    ["sponsor" => $spon],
                    __("return_messages.events_sponsors.AddedSucc"),
                    null
                );
            } else {
                return SystemApiResponseServices::ReturnFailed([],  __("return_messages.events_sponsors.AddedFailed"), null);
            }
        } catch (\Throwable $th) {
            throw $th;
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
    public function Edit(EventsSponsorsEditRequest $request, $sponsor_code)
    {

        // return $request->validated();
        try {
            $spon = DB::transaction(function () use ($request, $sponsor_code) {
                $ex_sponsor = EventsSponsorsServices::GetByCode(null, $sponsor_code);
                if ($request->hasFile("img")) {
                    $path = EventsSponsorsServices::UploadImg($request->code, $request->file("img"));
                    // dd($request);
                } else {
                    $path = $ex_sponsor;
                }
                $request['img'] = $path;
                // dd($request);
                $spon = EventsSponsorsServices::Edit($request->code, $request->validated());
                return $spon;
            });
            if ($spon) {
                return SystemApiResponseServices::ReturnSuccess(
                    ["sponsor" => $request->validated()],
                    __("return_messages.events_sponsors.EditSucc"),
                    null
                );
            } else {
                return SystemApiResponseServices::ReturnFailed([],  __("return_messages.events_sponsors.EditFailed"), null);
            }
        } catch (\Throwable $th) {
            throw $th;
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
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

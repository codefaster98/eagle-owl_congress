<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\forms_sponsorship\FormsSponsorshipAddNewRequest;
use App\Services\forms\FormsSponsorshipServices;
use App\Services\system\SystemApiResponseServices;
use Illuminate\Support\Facades\DB;

class form_sponsorship extends Controller
{
    public function AddNew(FormsSponsorshipAddNewRequest $request)
    {

        // return $request->validated();
        try {
            $req = DB::transaction(function () use ($request) {
                return FormsSponsorshipServices::AddNew($request->validated());
            });
            if ($req) {
                return SystemApiResponseServices::ReturnSuccess(
                    ["request" => $req],
                    __("return_messages.form_sponsorship.AddedSucc"),
                    null
                );
            } else {
                return SystemApiResponseServices::ReturnFailed([],  __("return_messages.form_sponsorship.AddedFailed"), null);
            }
        } catch (\Throwable $th) {
            throw $th;
            return SystemApiResponseServices::ReturnFailed([], __("global.Error"), $th->getMessage());
        }
    }
}

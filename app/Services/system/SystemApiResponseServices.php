<?php

namespace App\Services\system;

use Illuminate\Database\Eloquent\Collection;

class SystemApiResponseServices
{
    static function ReturnSuccess(array|Collection $data, string|array|null $message)
    {
        return response()->json([
            "code" => 200,
            "data" => $data,
            "message" => $message,
        ]);
    }
    static function ReturnFailed(array|Collection $data, string|array|null $message)
    {
        return response()->json([
            "code" => 404,
            "data" => $data,
            "message" => $message,
        ]);
    }
    static function ReturnError(int $code, array|Collection|null $data, string|null $message)
    {
        return response()->json([
            "code" => $code,
            "data" => $data,
            "message" => $message,
        ]);
    }
}

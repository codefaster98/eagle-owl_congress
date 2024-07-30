<?php

use App\Http\Controllers\events_speakers;
use App\Http\Controllers\events_sponsors;
use App\Http\Controllers\faqs;
use App\Http\Controllers\my;
use App\Http\Controllers\news;
use App\Http\Controllers\topics;
use Illuminate\Support\Facades\Route;


Route::get('', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%;  border: 1px solid black; border-collapse: collapse;' >";
    echo "<tr style='  border: 1px solid black; border-collapse: collapse;' >";
    echo "<td width='10%' style='border: 1px solid black; border-collapse: collapse;'><h4>HTTP Method</h4></td>";
    echo "<td width='30%' style='border: 1px solid black; border-collapse: collapse;'><h4>Route</h4></td>";
    echo "<td width='30%' style='border: 1px solid black; border-collapse: collapse;'><h4>Route</h4></td>";
    echo "<td width='10%' style='border: 1px solid black; border-collapse: collapse;'><h4>Name</h4></td>";
    echo "<td width='50%' style='border: 1px solid black; border-collapse: collapse;'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $value->methods()[0] . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'><a target='_blank' href='" . url('') . '/' . $value->uri() . "'>" . url('') . '/' . $value->uri() . "</a></td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . url("") . "/" . $value->uri() . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $value->getName() . "</td>";
        echo "<td style='border: 1px solid black; border-collapse: collapse;'>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    $value = "i love laravel";
    // $data =
    //     \Center\Http\Services\system\CenterSystemRuleGroupServices::GetSystemRules();
    // return $data;
});


// without auth
Route::name("api.")
    ->prefix("API")
    ->middleware(['api_without_auth'])
    ->group(function () {
        Route::name("faqs.")
            ->controller(faqs::class)
            ->prefix("FAQs")
            ->group(function () {
                Route::get('/All', 'WithOutAuthAll')->name("WithOutAuthAll");
            });
        Route::name("news.")
            ->controller(news::class)
            ->prefix("NEWs")
            ->group(function () {
                Route::get('/All', 'WithOutAuthAll')->name("WithOutAuthAll");
            });
        Route::name("topics.")
            ->controller(topics::class)
            ->prefix("Topics")
            ->group(function () {
                Route::get('/All', 'WithOutAuthAll')->name("WithOutAuthAll");
            });
        Route::name("events_speakers.")
            ->controller(events_speakers::class)
            ->prefix("Events-Speakers")
            ->group(function () {
                Route::get('/All', 'WithOutAuthAll')->name("WithOutAuthAll");
            });
        Route::name("events_sponsors.")
            ->controller(events_sponsors::class)
            ->prefix("Events-Sponsors")
            ->group(function () {
                Route::get('/All', 'WithOutAuthAll')->name("WithOutAuthAll");
            });
    });
// with auth
// without auth
Route::name("api.")
    ->prefix("API")
    ->middleware(['api_with_auth'])
    ->group(function () {
        Route::name("my.")
            ->controller(my::class)
            ->prefix("My")
            ->group(function () {
                Route::get('/Profile', 'Profile')->name("Profile");
                Route::post('/Change-Password', 'ChangePassword')->name("ChangePassword");
                Route::post('/Change-Name', 'ChangeName')->name("ChangeName");
                Route::post('/Change-Email', 'ChangeEmail')->name("ChangeEmail");
                Route::post('/Change-Phone', 'ChangePhone')->name("ChangePhone");
            });
    });

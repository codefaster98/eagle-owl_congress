<?php

use App\Http\Controllers\auth;
use Illuminate\Support\Facades\Route;

// without auth
Route::name("api.auth.")
    ->prefix("API/Auth")
    ->middleware(['api_without_auth'])
    ->controller(auth::class)
    ->group(function () {
        Route::post('/Register', 'Register')->name("Register");
        Route::post('/Login', 'Login')->name("Login");
        Route::post('/Verify', 'Verify')->name("Verify");
    });
// with auth
Route::name("api.auth.")
    ->prefix("API/Auth")
    ->middleware(['api_with_auth'])
    ->controller(auth::class)
    ->group(function () {
        Route::get('/Profile', 'Profile')->name("Profile");
        Route::post('/Logout', 'Logout')->name("Logout")->withoutMiddleware(['auth:api']);
    });























// // with auth 
// Route::name("admin.auth")
//     ->prefix("Admin/Auth")
//     ->middleware(['web_with_auth'])
//     ->group(function () {
//         // Route::name('local.')
//         //     ->controller(local::class)->group(function () {
//         //         Route::get('/Login', 'ViewLogin')->name("ViewLogin");
//         //         Route::post('/Login', 'Login')->name("Login");
//         //     });
//     });

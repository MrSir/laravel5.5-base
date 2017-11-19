<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    ['middleware' => 'api'],
    function () {
        // The Site resource routes
        Route::resource(
            '/site',
            'SiteController',
            [
                'only' => [
                    'index',
                    'store',
                    'show',
                    'update',
                    'destroy'
                ]
            ]
        );

        // The Page resource routes
        Route::resource(
            '/page',
            'PageController',
            [
                'only' => [
                    'index',
                    'store',
                    'update',
                    'destroy'
                ]
            ]
        );

        // The Element resource routes
        Route::resource(
            '/element',
            'ElementController',
            [
                'only' => [
                    'store',
                    'update',
                    'destroy'
                ]
            ]
        );
    }
);


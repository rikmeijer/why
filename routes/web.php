<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['location' => config('app.instance-configuration')('location')]);
});

Route::prefix('/server')->name('server.location.')->group(static function() {
    Route::get('/location', static function() {
        $location = config('app.location');
        if ($location !== null) {
            return response()->json($location);
        }
        return response(status: 404);
    })->name('get');

    Route::post('/location', static function() {
        config(['app.location' => request()->all()]);
        return response(status: 201);
    })->name('post');
});

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
    return view('welcome');
});

Route::prefix('/server')->name('server.location.')->group(static function() {
    Route::get('/location', static function() {
        if (Storage::disk('local')->exists('location')) {
            return response()->json(json_decode(Storage::disk('local')->get('location'), false, 512, JSON_THROW_ON_ERROR));
        }
        return response(status: 404);
    })->name('get');

    Route::post('/location', static function() {
        Storage::disk('local')->put('location', json_encode(request()->all(), JSON_THROW_ON_ERROR));
        return response(status: 201);
    })->name('post');
});

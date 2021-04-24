<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:api')->group( function() {

});
Route::group([
    'middleware' => 'api',
    'as' => 'api.'
    ], function () {

    Route::group([
        'prefix' => 'astrologists',
        'as' => 'astrologists.'
    ], function() {
        Route::get('/', [\App\Http\Controllers\AstrologistController::class, 'all'])->name('all');
        Route::get('/{astrologist}', [\App\Http\Controllers\AstrologistController::class, 'show'])->name('show');
    });
});

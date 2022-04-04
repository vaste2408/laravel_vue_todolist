<?php

use App\Http\Controllers\API\ListItemController;
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

Route::get('items', [ListItemController::class, 'index']);
Route::group(['prefix' => 'items'], function () {
    Route::post('add', [ListItemController::class, 'add']);
    Route::get('edit/{id}', [ListItemController::class, 'edit']);
    Route::post('update/{id}', [ListItemController::class, 'update']);
    Route::delete('delete/{id}', [ListItemController::class, 'delete']);
});

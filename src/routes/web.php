<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestJobController;
use App\Http\Controllers\SetPositionsController;
use App\Http\Controllers\GetPositionsController;


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

Route::get('/health', function () {
    return 'Health checked';
});

Route::get('/test', [TestJobController::class, 'testMethod']);
// Route::post('/set-positions', [SetPositionsController::class, 'set']);
Route::get('/set-positions', [SetPositionsController::class, 'set']);
Route::get('/get-positions', [GetPositionsController::class, 'get']);

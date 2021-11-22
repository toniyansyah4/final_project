<?php

use App\Http\Controllers\AppController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/patients', [AppController::class, 'index']);
Route::post('/patients', [AppController::class, 'store']);
Route::get('/patients/{id}', [AppController::class, 'show']);
Route::put('/patients/{id}', [AppController::class, 'update']);
Route::delete('/patients/{id}', [AppController::class, 'destroy']);
Route::get('/patients/search/{name}', [AppController::class, 'search']);
Route::get('/patients/status/positive', [AppController::class, 'positive']);
Route::get('/patients/status/recovered', [AppController::class, 'recovered']);
Route::get('/patients/status/dead', [AppController::class, 'dead']);
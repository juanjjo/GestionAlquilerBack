<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContratoController;
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

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});

//Local//
Route::group([
    'middleware' => 'api'
], function ($router) {

    // Route::get('/local', [LocalController::class, 'index']);

});

Route::group(['middleware' => ['auth.role:admin']], function () {
    Route::get('/local', [LocalController::class, 'index']);
    Route::get('/local/{id}', [LocalController::class, 'getById']);
    Route::post('/local', [LocalController::class, 'createLocal']);
    Route::put('/local/update/{id}', [LocalController::class, 'updateLocal']);
    Route::delete('local/{id}', [LocalController::class, 'deleteLocal']);

    //usuarios
    Route::get('/usuario', [UsuarioController::class, 'getAll']);
    Route::get('/usuario/{id}', [UsuarioController::class, 'getOne']);
});

Route::post('/local', [LocalController::class, 'createLocal']);
    Route::get('/contrato', [ContratoController::class, 'getAll']);
    Route::get('/contrato/{id}', [ContratoController::class, 'getById']);
    Route::post('/contrato', [ContratoController::class, 'createContrato']);
    Route::put('/contrato/update/{id}', [ContratoController::class, 'updateContrato']);
    Route::delete('contrato/{id}', [ContratoController::class, 'deleteContrato']);

//usuario
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    // Route::post('login', [AuthController::class, 'login']);
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});

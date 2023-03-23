<?php

use App\Http\Controllers\Api\Auth\ForgotPasswordController;
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
Route::post('password/request', [ForgotPasswordController::class, 'sendResetLinkEmail']); // パスワード再設定メール送信
Route::post('password/reset', [ForgotPasswordController::class, 'resetPassword']); // パスワード再設定
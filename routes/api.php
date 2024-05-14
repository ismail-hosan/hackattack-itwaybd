<?php


use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\GameController;
use App\Http\Controllers\api\ScoreController;
use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\VideoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('{type}', [GameController::class, 'index']);
Route::post('/scoreupdate', [GameController::class, 'scrorepdate']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('game/slider', [SliderController::class, 'index']);
Route::get('game/video', [VideoController::class, 'index']);
Route::post('/user', [AuthController::class, 'user']);
Route::get('/user/leaderboard', [ScoreController::class, 'leaderboard']);




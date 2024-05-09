<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\GameController;
use App\Http\Controllers\admin\SliderController;

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
    return view('fontend.index');
});

Auth::routes();


Route::get('/admin', function () {
    return redirect()->route('login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');
Route::post('/update_password', [App\Http\Controllers\HomeController::class, 'update_password'])->name('update_password');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\HomeController::class, 'profile_update'])->name('profile_update');

Route::get('/user/login', [App\Http\Controllers\Auth\user\Logincontroller::class, 'show_page'])->name('user_show_page');
Route::Post('/user/login', [App\Http\Controllers\Auth\user\Logincontroller::class, 'store'])->name('user_store');

//============== Admin Pages ======================//
Route::get('/game', [GameController::class, 'index'])->name('game_index');
Route::get('/add/{type}', [GameController::class, 'add'])->name('game_add');
// Route::get('/add/{type}', 'YourController@yourMethod')->name('game_add');
Route::post('/game/store', [GameController::class, 'store'])->name('game_store');
Route::get('/game/edit/{id}', [GameController::class, 'edit'])->name('game_edit');
Route::get('/game/delete/{id}', [GameController::class, 'delete'])->name('game_delete');
Route::post('/game/update', [GameController::class, 'update'])->name('game_update');


//=============== Admin Slider ================//
Route::get('/slider', [SliderController::class, 'index'])->name('slider_index');





Route::post('/user/registation', [App\Http\Controllers\Auth\user\RegisterController::class, 'store'])->name('user_register');






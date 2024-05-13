<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\GameController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\VideoController;

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
Route::get('/slider/add', [SliderController::class, 'create'])->name('slider_add');
Route::post('/slider/store', [SliderController::class, 'store'])->name('slider_store');
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider_show');
Route::post('/slider/update', [SliderController::class, 'update'])->name('slider_update');
Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider_delete');



//=============== Admin video==============///
Route::get('/video', [VideoController::class, 'index'])->name('video_index');
Route::get('/video/add', [VideoController::class, 'create'])->name('video_create');
Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video_show');
Route::post('/video/store', [VideoController::class, 'store'])->name('video_store');
Route::post('/video/update', [VideoController::class, 'update'])->name('video_update');
Route::get('/video/delete/{id}', [VideoController::class, 'destroy'])->name('video_delete');






Route::post('/user/registation', [App\Http\Controllers\Auth\user\RegisterController::class, 'store'])->name('user_register');






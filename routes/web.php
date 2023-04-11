<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ClientController::class,'index'])->name('main');

Route::resource('/client',ClientController::class);

// Route::resource('/profile',ProfileController::class);
Route::resource('/profile',ProfileController::class)->middleware('auth');


Route::get('/login',[LoginController::class,'show'])->name('login.index');
Route::post('/login/store',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('test',function(){
    return view('client.thank');
});
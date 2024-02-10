<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/registration',[RegisterController::class,'register'])->name('register');
Route::get('/admin/login',[LoginController::class,'loginindex'])->name('login');

Route::post('/admin/regsubmit',[RegisterController::class,'regsubmit'])->name('add.reg');


Route::post('/admin-login',[LoginController::class,'adminlogin'])->name('admin.login');

Route::group(['prefix'=>'admin','$middleware'=>'register'],function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard']);

    Route::get('/logout',[LoginController::class,'logout'])->name('log.out');

});
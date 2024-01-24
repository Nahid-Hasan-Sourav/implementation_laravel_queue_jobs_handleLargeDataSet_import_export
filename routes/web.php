<?php

use App\Http\Controllers\AuthController\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name("home");
Route::get('/dashboard',[DashboardController::class,'index'])->name("dashboard");
Route::get('/user/register',[AuthController::class,'index'])->name("user.register");
Route::get('/user/login',[AuthController::class,'userLogin'])->name("user.login");

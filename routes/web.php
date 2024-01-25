<?php

use App\Http\Controllers\AuthController\AuthController;
use App\Http\Controllers\Category\CatyegoryController;
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

Route::get('/user/register',[AuthController::class,'index'])->name("user.register");
Route::get('/user/login/view',[AuthController::class,'userLoginView'])->name("user.login.view");
Route::post('/user/create',[AuthController::class,'userCreate'])->name("user.create");
Route::post('/userlogin',[AuthController::class,'userLogin'])->name("user.login");

//AUTHENTIC ROUTE START HERE
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name("dashboard");
    Route::post('/user/logout',[AuthController::class,'userLogout'])->name("user.logout");
    Route::get('/category/view',[CatyegoryController::class,'index'])->name("category.view");
    Route::post('/category/store',[CatyegoryController::class,'store'])->name("category.store");
    Route::get('/all-category',[CatyegoryController::class,'getAllCategory'])->name("category.get");
    //this is model binding start here 
    Route::get('/category/edit/{category}',[CatyegoryController::class,'editCategory'])->name("category.edit");
    Route::put('/category/update/{category}', [CatyegoryController::class, 'updateCategory'])->name('category.update');
    Route::get('/category/delete/{category}', [CatyegoryController::class, 'destroyCategory'])->name('category.destroy');

    //this is model binding end here 

});
//AUTHENTIC ROUTE END HERE




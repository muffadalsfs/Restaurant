<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

route::middleware('auth')->group(function(){
    Route::get('/customers', [CustomerController::class, 'create']);
    Route::post('/customers', [CustomerController::class, 'store']);
    
    Route::get('/tables', [TableController::class, 'create']);
    Route::post('/tables', [TableController::class, 'store']);
    
    Route::get('/menu', [MenuController::class, 'showMenu']);
    Route::post('/menu/store', [MenuController::class, 'storeSelection']);
    
    Route::get('/order/confirm', [OrderController::class, 'confirm']);
    route::post('oder',[OrderController::class,'store']);
    route::view('oder1','order1');
 
    Route::get('delete/{id}',[CustomerController::class,'delete']);
    Route::get('edit/{id}',[CustomerController::class,'edit']);
    Route::put('update/{id}',[CustomerController::class, 'update'])->name('blog.update');
});
Route::get('/',[OrderController::class,'home']);
route::view('login','login');
route::post('login',[LoginController::class, 'login']);
Route::view('register','register');
Route::post('register',[RegisterController::class,'register']);
Route::get('/book-table/{table_id}', [TableController::class, 'index'])->name('bookTable');
Route::post('logout', [LoginController::class, 'logout']);

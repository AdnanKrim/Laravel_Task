<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

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
    return view('login');
});
Route::get('/registration-from',[UserController::class,'registrationForm']);
Route::post('/register',[UserController::class,'registration'])->name('register');
Route::post('/user-check',[UserController::class,'userCheck']);

Route::group(['name'=>'user', 'middleware'=>'userDetail'], function(){

    Route::get('/user-detail',[UserController::class,'userDetail']);

    Route::get('/deposite-form',[TransactionController::class,'depositeForm']);
    Route::post('/user-deposite',[TransactionController::class,'deposite']);

    Route::get('/withdraw-form',[TransactionController::class,'withdrawForm']);
    Route::post('/user-withdraw',[TransactionController::class,'withdraw']);


});
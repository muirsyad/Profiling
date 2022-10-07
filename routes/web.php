<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;

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

Route::get('/',[userController::class,'index'])->name('login');

Route::get('/register',[userController::class,'create'])->name('register');
Route::post('/Cadmin',[userController::class,'Rstore'])->name('adminR');

//admin routes
Route::get('/admin/index',[adminController::class,'index'])->name('ad_index');
Route::get('/admin/clients',[adminController::class,'Chome'])->name('cHome');
Route::get('/admin/clients/create',[adminController::class,'create'])->name('Ccreate');
Route::post('/admin/clients/create/store',[adminController::class,'store'])->name('Cstore');
Route::get('/admin/clients/view',[adminController::class,'view'])->name('Cview');
Route::get('/admin/clients/details/{clients}',[adminController::class,'details'])->name('details');
Route::get('/admin/clients/delete/{clients}',[adminController::class,'Cdelete'])->name('delete');
Route::get('/admin/clients/update/{clients}',[adminController::class,'update'])->name('update');
Route::post('/admin/clients/change/{clients}',[adminController::class,'change'])->name('update');
Route::get('/admin/questions',[adminController::class,'vquest'])->name('vquest');
Route::get('/admin/profile',[adminController::class,'profile'])->name('profile');

//


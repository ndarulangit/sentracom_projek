<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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
Route::get('/', [PagesController::class,'home']);
Route::get('/user/service', [PagesController::class,'service']);
Route::get('/user/sparepart', [PagesController::class,'sparepart']);
Route::get('/user/checkout', [PagesController::class,'checkout']);
Route::get('/user/history', [PagesController::class,'history']);
Route::get('/user/profile', [PagesController::class,'profile']);
Route::get('/', [PagesController::class,'home']);
Route::get('/', [PagesController::class,'home']);

Route::get('/login', [PagesController::class,'login']);
Route::get('/teknisi', [PagesController::class,'teknisi']);
Route::get('/teknisi/service', [PagesController::class,'teknisi_s']);
Route::get('/admin', [PagesController::class,'admin']);
Route::get('/admin/sparepart', [PagesController::class,'admin_d']);
Route::get('/admin/history', [PagesController::class,'admin_h']);


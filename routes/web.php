<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\TeknisiLoginController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;


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
// ============================================================================================================================================
// =====================ADMIN=================================================================================
// ============================================================================================================================================
Route::get('/login', [PagesController::class, 'showLoginForm'])->name('login');
Route::post('/login', [PagesController::class, 'step'])->name('login.step');
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//Admin Home page after login
Route::group(['middleware'=>'admin'], function() {
    Route::get('/admin/download', [AdminController::class, 'export']);
    Route::post('/admin/filter', [AdminController::class, 'filter'])->name('filter.admin');
    Route::get('/admin/dashboard', [AdminController::class, 'database'])->name('dashboard.admin');
    Route::get('/admin/history', [AdminController::class, 'history'])->name('history.admin');
    Route::get('/admin/confirm', [AdminController::class, 'orderan'])->name('confirm.admin');
    Route::post('/admin/confirm', [AdminController::class, 'konfirmasi'])->name('admin.confirm');
    Route::get('/admin/register', [AdminController::class, 'register'])->name('register.admin');
    Route::get('/admin/tracking', [AdminController::class, 'track'])->name('tracking.admin');
    Route::post('/admin/tracking', [AdminController::class, 'track_post'])->name('admin.tracking');

});
// // ============================================================================================================================================
// //=====================TEKNISI=================================================================================
// // ============================================================================================================================================
Route::get('/teknisi/login', [TeknisiLoginController::class, 'showLoginForm'])->name('teknisi.login');
Route::post('/teknisi/login', [TeknisiLoginController::class, 'login'])->name('teknisi.login.post');
Route::post('/teknisi/logout', [TeknisiLoginController::class, 'logout'])->name('teknisi.logout');
//Admin Home page after login
Route::group(['middleware'=>'teknisi'], function() {
    Route::get('/teknisi/home', [TeknisiController::class, 'home'])->name('dashboard.teknisi');
});
// ============================================================================================================================================
// =====================USER=================================================================================
// ============================================================================================================================================


Route::get('/user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'login'])->name('user.login.post');
Route::post('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');
//Admin Home page after login
Route::group(['middleware'=>'user'], function() {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/user/service', [ServiceController::class,'service'])->name('user.service');
    Route::post('/user/service', [ServiceController::class,'orderse'])->name('user.service.post');
    Route::get('/user/sparepart', [UserController::class,'sparepart'])->name('user.sp');
    Route::post('/user/sparepart', [UserController::class,'sparepart'])->name('user.sp');
    Route::post('/user/sparepart/kirim', [UserController::class,'order'])->name('user.order');
    // Route::post('/user/sparepart/order/{id_s}', [UserController::class,'submit'])->name('user.submit');
    Route::get('/user/checkout_sv', [UserController::class,'checkout_sv']);
    Route::get('/user/checkout_sp', [UserController::class,'checkout_sp'])->name('cekot.sp');
    Route::get('/user/history', [UserController::class,'history'])->name('user.track');
    Route::get('/user/invoice', [UserController::class,'invoice'])->name('user.invoice');
    Route::post('/user/invoice/{total}', [UserController::class,'invoice_post'])->name('invoice.post');
    Route::post('/user/checkout_sp/order', [UserController::class,'sp_order'])->name('user.sp.order');
    Route::get('/user/profile', [UserController::class,'profile'])->name('user.profile');
    Route::post('/user/profile/{id}', [UserController::class,'update'])->name('post.edit');

});
Route::get('/user/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'store'])->name('user.register.post');


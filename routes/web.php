<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\TeknisiLoginController;
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
// Route::get('/', [PagesController::class,'home']);
// Route::get('/user/service', [PagesController::class,'service']);
// Route::get('/user/sparepart', [PagesController::class,'sparepart']);
// Route::get('/user/checkout', [PagesController::class,'checkout']);
// Route::get('/user/history', [PagesController::class,'history']);
// Route::get('/user/profile', [PagesController::class,'profile']);
// Route::get('/', [PagesController::class,'home']);
// Route::get('/', [PagesController::class,'home']);

// Route::get('/login', [PagesController::class,'login']);
// Route::get('/teknisi', [PagesController::class,'teknisi']);
// Route::get('/teknisi/service', [PagesController::class,'teknisi_s']);
// Route::get('/admin', [PagesController::class,'admin']);
// Route::get('/admin/sparepart', [PagesController::class,'admin_d']);
// Route::get('/admin/history', [PagesController::class,'admin_h']);

// ============================================================================================================================================
// =====================ADMIN=================================================================================
// ============================================================================================================================================
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
//Admin Home page after login
Route::group(['middleware'=>'admin'], function() {
    Route::get('/admin/home', [AdminController::class, 'homeindex']);
});
// // ============================================================================================================================================
// //=====================TEKNISI=================================================================================
// // ============================================================================================================================================
Route::get('/teknisi/login', [TeknisiLoginController::class, 'showLoginForm'])->name('teknisi.login');
Route::post('/teknisi/login', [TeknisiLoginController::class, 'login'])->name('teknisi.login.post');
Route::post('/teknisi/logout', [TeknisiLoginController::class, 'logout'])->name('teknisi.logout');
//Admin Home page after login
Route::group(['middleware'=>'teknisi'], function() {
    Route::get('/teknisi/home', [PagesController::class, 'index']);
});
// ============================================================================================================================================
// =====================USER=================================================================================
// ============================================================================================================================================


Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [UserLoginController::class, 'login'])->name('user.login.post');
Route::get('/logout', [UserLoginController::class, 'logout'])->name('user.logout');
//Admin Home page after login
Route::group(['middleware'=>'user'], function() {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/user/service', [ServiceController::class,'service'])->name('user.service');
    Route::post('/user/service', [ServiceController::class,'orderse'])->name('user.service.post');
    Route::get('/user/sparepart', [UserController::class,'sparepart'])->name('user.sp');
    Route::post('/user/sparepart', [UserController::class,'sparepart'])->name('user.sp');
    Route::post('/user/sparepart/kirim', [UserController::class,'order'])->name('user.order');
    Route::post('/user/sparepart/order/{id_s}', [UserController::class,'submit'])->name('user.submit');
    Route::get('/user/checkout_sv', [UserController::class,'checkout_sv']);
    Route::get('/user/checkout_sp', [UserController::class,'checkout_sp']);
    Route::get('/user/history', [UserController::class,'history'])->name('user.track');
    Route::get('/user/invoice', [UserController::class,'invoice'])->name('user.invoice');
    Route::post('/user/invoice', [UserController::class,'invoice'])->name('user.invoice');
    Route::get('/user/profile', [UserController::class,'profile'])->name('user.profile');
    Route::post('/user/profile/{id}', [UserController::class,'update'])->name('post.edit');

});
Route::get('/user/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'store'])->name('user.register.post');


<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/store',[AuthController::class, 'store'])->name('store');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/forget/password',[AuthController::class, 'forgetPassword'])->name('forget_password');
Route::post('/forget/password/store',[AuthController::class, 'forgetPassword_store'])->name('password_store');
Route::get('reset/{token}',[AuthController::class, 'forgetPassword_reset'])->name('reset');
Route::post('reset/{token}',[AuthController::class, 'changePassword'])->name('savePassword');

Route::get('/register',[RegisterController::class, 'index'])->name('register');



Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard',[DashboardController::class, 'dashboard'])->name('admin');
    Route::get('admin/list',[AdminController::class, 'index'])->name('admin_list');

    Route::get('admin/category',[CategoryController::class, 'index'])->name('addCategory');
});
Route::group(['middleware' => 'school'], function(){
    Route::get('school/dashboard',[DashboardController::class, 'dashboard'])->name('school');
});
Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard',[DashboardController::class, 'dashboard'])->name('teacher');
});
Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard',[DashboardController::class, 'dashboard'])->name('parent');
});
Route::group(['middleware' => 'student'], function(){
    Route::get('student/dashboard',[DashboardController::class, 'dashboard'])->name('student');
});
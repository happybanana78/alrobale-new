<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MenuController::class, 'getMenus']);   // Load HomePage

Route::post('/send', [UserController::class, 'sendEmail']); // Send email with contact form

Route::post('/menu/upload', [MenuController::class, 'uploadMenu']); // Upload new menu

Route::post('/menu/remove', [MenuController::class, 'removeMenu']); // Remove menu

Route::get('/admin', [UserController::class, 'getAdmin']);  // Go to admin login form

Route::post('/admin/login', [UserController::class, 'adminLogin']); // Login as admin

Route::post('/logout', [UserController::class, 'adminLogout']); // Logout from admin account

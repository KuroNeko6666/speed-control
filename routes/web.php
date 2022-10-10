<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'viewRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ViewController::class, 'Dashboard'])->name('home');
    Route::get('/chart', [ViewController::class, 'Chart']);
    Route::get('/table', [ViewController::class, 'Table']);
    Route::get('/component/button', [ViewController::class, 'Button']);
    Route::get('/component/card', [ViewController::class, 'Card']);
    Route::get('/pages/blank', [ViewController::class, 'Blank']);
    Route::get('/pages/forgot', [ViewController::class, 'Forgot']);
    Route::get('/pages/login', [ViewController::class, 'Login']);
    Route::get('/pages/404', [ViewController::class, 'NotFound']);
    Route::get('/pages/register', [ViewController::class, 'Register']);
    Route::get('/utilities/animation', [ViewController::class, 'Animation']);
    Route::get('/utilities/border', [ViewController::class, 'Border']);
    Route::get('/utilities/color', [ViewController::class, 'Color']);
    Route::get('/utilities/other', [ViewController::class, 'Other']);
});

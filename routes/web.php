<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;

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
    return view('welcome');
});
Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/home', [TemplateController::class, 'Dashboard']);
Route::get('/chart', [TemplateController::class, 'Chart']);
Route::get('/table', [TemplateController::class, 'Table']);
Route::get('/component/button', [TemplateController::class, 'Button']);
Route::get('/component/card', [TemplateController::class, 'Card']);
Route::get('/pages/blank', [TemplateController::class, 'Blank']);
Route::get('/pages/forgot', [TemplateController::class, 'Forgot']);
Route::get('/pages/login', [TemplateController::class, 'Login']);
Route::get('/pages/404', [TemplateController::class, 'NotFound']);
Route::get('/pages/register', [TemplateController::class, 'Register']);
Route::get('/utilities/animation', [TemplateController::class, 'Animation']);
Route::get('/utilities/border', [TemplateController::class, 'Border']);
Route::get('/utilities/color', [TemplateController::class, 'Color']);
Route::get('/utilities/other', [TemplateController::class, 'Other']);


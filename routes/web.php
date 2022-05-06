<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsernameController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/usernameAvailableCheck/checkUsername', [UsernameController::class, 'checkUsername'])->name('usernameAvailableCheck');
Route::post('/registration', [RegisterController::class, 'registration'])->name('createProfile');

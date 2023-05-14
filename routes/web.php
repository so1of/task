<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;

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

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login',[LoginController::class , 'login'] )->name('form-login');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');
Route::post('/registration',[RegistrationController::class , 'registration'] )->name('form-registration');

Route::middleware('auth')->group( function () {

    Route::resource('task', TaskController::class);
    Route::get('/logout',[LoginController::class , 'logout'] )->name('logout');

});

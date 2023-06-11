<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/connected', 'ConnexionController@showLoginForm')->name('connexion');
Route::post('/connected', 'ConnexionController@login');

Route::post('/connected', 'ConnexionController@login')->name('connected');
Route::get('/', [WelcomeController::class, 'welcome']);
Route::get('/connected', function () {
    return view('connected');
})->name('connected');
Route::get('/modifier', function () {
    return view('modifier'); 
})->name('modifier');

Route::get('/welcome', function () {
    return view('welcome'); 
})->name('welcome');
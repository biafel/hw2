<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Collection;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Songs;



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

Route::get('/', [HomeController::class, 'index'])->name("home");


Route::get("/login", [LoginController::class , 'login'])->name('login');
Route::post("/login", [LoginController::class , 'checklogin'])->name('checklogin');

Route::get('/register', [RegisterController::class , 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);
Route::get('/register/email/{query}', [RegisterController::class, 'checkEmail']);
Route::get("register/username/{q}", [RegisterController::class , 'checkUsername']);


Route::get('/logout', [LoginController::class , 'logout'])->name("logout");

Route::get('/libreria', [LibraryController::class, 'library'])->name('library');

Route::post('login/request', [LoginController::class , 'checklogin']) -> name("checklogin");

Route::get('spotify/{title}', [Songs::class, 'get_serch_song']);

Route::get('lyrics/{name_artist}/{name_song}', [Songs::class, 'get_serch_lyrics']);

Route::get('fav/{img}/{url}', [Songs::class, 'add_fav']);

Route::get('del/{img}/{url}', [Songs::class, 'rem_fav']);

Route::get('all_fav', [Songs::class, 'all_fav']);

Route::get('last_rep/{img}/{url}', [Songs::class, 'add_last']);

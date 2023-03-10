<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

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

Route::resource('user', UserController::class)->except('store', 'update');


Route::get('/', Welcome::class)->name('welcome');

Route::get('/login', function(){
    return view('login');
});

<?php

use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\Login;
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

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/counter', Counter::class); // Use fully qualified name
Route::get('/login', Login::class)->name('login');

Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');

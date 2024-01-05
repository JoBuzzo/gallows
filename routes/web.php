<?php

use App\Livewire\DuoGallows;
use App\Livewire\Gallows;
use App\Livewire\QuadraGallows;
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

Route::get('/', Gallows::class)->name('gallows');
Route::get('/duo', DuoGallows::class)->name('gallows.duo');
Route::get('/quadra', QuadraGallows::class)->name('gallows.quadra');


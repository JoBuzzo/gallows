<?php

use App\Livewire\About;
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

Route::get('/', Gallows::class)->name('gallows')
    ->middleware('checkSessionExpiration');
Route::get('/duo', DuoGallows::class)->name('gallows.duo')
    ->middleware('checkSessionExpiration');
Route::get('/quadra', QuadraGallows::class)->name('gallows.quadra')
    ->middleware('checkSessionExpiration');
    
Route::get('/sobre',About::class)->name('about');

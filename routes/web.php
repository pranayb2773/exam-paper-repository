<?php

use App\Livewire\Admin\User\Create;
use App\Livewire\Admin\User\Edit;
use App\Livewire\Admin\User\Index;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::get('/users', Index::class)->name('users');
    Route::get('/users/create', Create::class)->name('users.create');
    Route::get('/users/{id}/edit', Edit::class)->name('users.edit');
    Route::view('profile', 'profile')->name('auth.profile');
});

require __DIR__.'/auth.php';

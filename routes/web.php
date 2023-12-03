<?php

use App\Livewire\Admin\Branch\Create as CreateBranch;
use App\Livewire\Admin\Branch\Edit as EditBranch;
use App\Livewire\Admin\Branch\Show as ShowBranch;
use App\Livewire\Admin\User\Create as CreateUser;
use App\Livewire\Admin\User\Edit as EditUser;
use App\Livewire\Admin\Branch\Index as BranchesTable;
use App\Livewire\Admin\User\Index as UsersTable;
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
    Route::get('/users', UsersTable::class)->name('users');
    Route::get('/users/create', CreateUser::class)->name('users.create');
    Route::get('/users/{id}/edit', EditUser::class)->name('users.edit');
    Route::view('profile', 'profile')->name('auth.profile');

    Route::get('/branches', BranchesTable::class)->name('branches');
    Route::get('/branches/create', CreateBranch::class)->name('branches.create');
    Route::get('/branches/{id}/edit', EditBranch::class)->name('branches.edit');
    Route::get('/branches/{id}/show', ShowBranch::class)->name('branches.show');
});

require __DIR__.'/auth.php';

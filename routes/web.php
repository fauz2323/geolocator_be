<?php

use App\Http\Controllers\Admin\FaskesController;
use App\Http\Controllers\Admin\KategoryFaskesController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\User\FaskesUserController;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('role:admin')->group(function () {
    //user
    Route::get('user-list', [UserAdminController::class, 'index'])->name('index-user');
    Route::get('user-detail/{id}', [UserAdminController::class, 'detail'])->name('detail-user');
    Route::post('user-change-profile/{id}', [UserAdminController::class, 'changeProfil'])->name('profile-user');
    Route::post('user-change-password/{id}', [UserAdminController::class, 'changePass'])->name('password-user');

    //kategory
    Route::get('kategori-list', [KategoryFaskesController::class, 'index'])->name('index-kategory');
    Route::get('kategori-edit/{id}', [KategoryFaskesController::class, 'editView'])->name('view-edit-kategory');
    Route::post('kategory-save/{id}', [KategoryFaskesController::class, 'storeView'])->name('edit-kategory');
    Route::post('kategory-add', [KategoryFaskesController::class, 'store'])->name('add-kategory');
    Route::get('kategory-delete/{id}', [KategoryFaskesController::class, 'delete'])->name('delete-kategory');

    //faskes
    Route::get('faskes-list', [FaskesController::class, 'index'])->name('index-faskes');
    Route::get('faskes-edit/{id}', [FaskesController::class, 'editView'])->name('view-edit-faskes');
    Route::post('faskes-save/{id}', [FaskesController::class, 'storeView'])->name('edit-faskes');
    Route::post('faskes-add', [FaskesController::class, 'store'])->name('add-faskes');
    Route::get('faskes-delete/{id}', [FaskesController::class, 'delete'])->name('delete-faskes');
});

Route::middleware('role:user')->group(function () {
    //
    Route::post('faskes-user-add', [FaskesUserController::class, 'store'])->name('add-user-faskes');
    Route::post('faskes-user-edit', [FaskesUserController::class, 'edit'])->name('edit-user-faskes');
});

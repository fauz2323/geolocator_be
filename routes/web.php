<?php

use App\Http\Controllers\Admin\KategoryFaskesController;
use App\Http\Controllers\Admin\UserAdminController;
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
    return view('welcome');
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
    Route::post('kategory-edit/{id}', [KategoryFaskesController::class, 'storeView'])->name('edit-kategory');
    Route::post('kategory-add', [KategoryFaskesController::class, 'store'])->name('add-kategory');
    Route::get('kategory-delete/{id}', [KategoryFaskesController::class, 'delete'])->name('delete-kategory');
});

Route::middleware('role:user')->group(function () {
    //
});

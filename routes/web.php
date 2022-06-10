<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInterestController;
use App\Http\Controllers\AdminMatchController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\UserAppController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserMatchesController;
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



Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class,'index']);
Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'verifyRole:admin'], function() {
        Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/admin/dashboard/users', [AdminDashboardController::class,'users'])->name('admin.dashboard.users');
        Route::get('/admin/dashboard/matches', [AdminDashboardController::class,'matches'])->name('admin.dashboard.matches');
        Route::get('/admin/dashboard/interests', [AdminDashboardController::class,'interests'])->name('admin.dashboard.interests');
        Route::post('/admin/interest', [AdminInterestController::class,'create'])->name('admin.interest.create');//
        Route::delete('/admin/interest/{id}', [AdminInterestController::class,'delete'])->name('admin.interest.delete');
        Route::delete('/admin/match/{id}', [AdminMatchController::class,'delete'])->name('admin.match.delete');
        Route::put('/admin/interest/{id}', [AdminInterestController::class,'update'])->name('admin.interest.update');
        Route::delete('/admin/user/{id}', [AdminUserController::class,'delete'])->name('admin.user.delete');
    });
    Route::group(['middleware' => 'verifyRole:user'], function() {
        Route::get('/dashboard', [UserDashboardController::class,'index'])->name('user.dashboard');
        Route::get('/dashboard/matches', [UserDashboardController::class,'matches'])->name('user.dashboard.matches');
        Route::get('/dashboard/settings', [UserDashboardController::class,'settings'])->name('user.dashboard.settings');
        Route::post('/user/update/info', [UserDashboardController::class,'updateInfo'])->name('user.updateInfo');
        Route::post('/user/update/password', [UserDashboardController::class,'updatePassword'])->name('user.update.password');
        Route::put('/user/update/image', [UserDashboardController::class,'updateProfileImage'])->name('user.updateProfileImage');
        Route::get('/app', [UserAppController::class,'index'])->name('user.app');
        Route::put('/app/like/{id}', [UserAppController::class,'like'])->name('user.app.like');
        Route::put('/app/unlike/{id}', [UserAppController::class,'unlike'])->name('user.app.unlike');
    });
});


require __DIR__.'/auth.php';

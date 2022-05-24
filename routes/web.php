<?php

use App\Http\Controllers\AdminDashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class,'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'verifyRole:admin'], function() {
        Route::get('/admin/dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/admin/dashboard/users', [AdminDashboardController::class,'users'])->name('admin.dashboard.users');
        Route::get('/admin/dashboard/matches', [AdminDashboardController::class,'matches'])->name('admin.dashboard.matches');

    });
    Route::group(['middleware' => 'verifyRole:user'], function() {
        Route::get('/dashboard', [UserDashboardController::class,'index'])->name('user.dashboard');
        Route::get('/matches', [UserMatchesController::class,'index'])->name('user.matches');
        Route::post('/user/update/info', [UserDashboardController::class,'updateInfo'])->name('user.updateInfo');
        Route::put('/user/update/image', [UserDashboardController::class,'updateProfileImage'])->name('user.updateProfileImage');
        Route::delete('/user/delete', [UserDashboardController::class,'deleteUser'])->name('user.delete');
        Route::get('/app', [UserAppController::class,'index'])->name('user.app');
        Route::post('/like/{id}', [UserAppController::class,'like'])->name('user.app.like');
    });
    Route::group(['middleware' => 'verifyRole:guest'], function() {
        Route::get('/', function () {
            return view('auth.login');
        });
    });
});


require __DIR__.'/auth.php';

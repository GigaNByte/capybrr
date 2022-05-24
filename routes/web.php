<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
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
        Route::get('/admin/dashboard', [\App\Http\Controllers\AdminDashboardController::class,'index'])->name('admin.dashboard');

        Route::get('/admin/dashboard/users', function () {
            return view('admin.dashboard.users');
        });
        Route::get('/admin/dashboard/matches', function () {
            return view('admin.dashboard.matches');
        });
        Route::get('/admin/dashboard/about', function () {
            return view('admin.dashboard.about');
        });
    });
    Route::group(['middleware' => 'verifyRole:user'], function() {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('userDashboard');
    });
    Route::group(['middleware' => 'verifyRole:guest'], function() {
        Route::get('/', function () {
            return view('auth.login');
        });
    });
});


require __DIR__.'/auth.php';

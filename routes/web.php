<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolePermissionController;
use App\Models\User;
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
    return redirect()->route('login.create');
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::get('post/approve', [PostController::class, 'approve'])->name('posts.approve');
    Route::get('post/approve/status/{id}', [PostController::class, 'approveStatus'])->name('posts.approve_status');
    Route::get('post/reject/status/{id}', [PostController::class, 'rejectStatus'])->name('posts.reject_status');

    Route::post("/logout", [LogoutController::class, "store"])->name("logout");

    Route::resource('role-permissions', RolePermissionController::class);
    Route::get('role/index', [RolePermissionController::class, 'roleIndex'])->name('role.index');
    Route::post('role/store', [RolePermissionController::class, 'roleStore'])->name('role.store');
    Route::get('role/has/permission', [RolePermissionController::class, 'roleHasPermission'])->name('role.has_permission');
});

Route::get('login', [LoginController::class, 'create'])->name('login.create');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

Route::group(['middleware' => ['auth', 'role:editor']], function () {
    Route::get('role', function () {
        dd('hi');
    });
});

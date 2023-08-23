<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));
    });

    Route::resource('posts', PostController::class);
    Route::get('post/approve', [PostController::class, 'approve'])->name('posts.approve');
    Route::get('post/approve/status/{id}', [PostController::class, 'approveStatus'])->name('posts.approve_status');
    Route::get('post/reject/status/{id}', [PostController::class, 'rejectStatus'])->name('posts.reject_status');

    Route::post("/logout", [LogoutController::class, "store"])->name("logout");
});

Route::get('login', [LoginController::class, 'create'])->name('login.create');
Route::post('login/store', [LoginController::class, 'store'])->name('login.store');
Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');


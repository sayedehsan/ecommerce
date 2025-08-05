<?php

use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

Route::group(['middleware' => ['auth','verified'], 'prefix'=>'user', 'as' => 'user.'],function(){
    Route::get('dashboard',[UserDashboardController::class, 'index'])->name('dashboard');
});

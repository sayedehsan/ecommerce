<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\backend\ProfileController;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('update',[ProfileController::class, 'update'])->name('profile.update');
Route::post('update-password',[ProfileController::class, 'updatePassword'])->name('update.password');
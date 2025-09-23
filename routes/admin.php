<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\CategoryController;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('update',[ProfileController::class, 'update'])->name('profile.update');
Route::post('update-password',[ProfileController::class, 'updatePassword'])->name('update.password');

Route::post('categories', [CategoryController::class,'index'])->name('categories.store');
Route::get('categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('categories/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('categories/{id}', [CategoryController::class,'update'])->name('categories.update');
Route::delete('categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');
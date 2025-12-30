<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubcategoryController;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('update',[ProfileController::class, 'update'])->name('profile.update');
Route::post('update-password',[ProfileController::class, 'updatePassword'])->name('update.password');

Route::post('categories', [CategoryController::class,'store'])->name('categories.store');
Route::get('categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('categories/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('categories/{id}', [CategoryController::class,'update'])->name('categories.update');
Route::delete('categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');

Route::post('subcategories', [SubcategoryController::class,'store'])->name('subcategories.store');
Route::get('subcategories', [SubcategoryController::class,'index'])->name('subcategories.index');
Route::get('subcategories/{id}',[SubcategoryController::class,'edit'])->name('subcategories.edit');
Route::put('subcategories/{id}', [SubcategoryController::class,'update'])->name('subcategories.update');
Route::delete('subcategories/{id}', [SubcategoryController::class,'destroy'])->name('subcategories.destroy');
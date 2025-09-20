<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.list');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{id}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
Route::put('/arsip/{id}', [ArsipController::class, 'update'])->name('arsip.update');
Route::delete('/arsip/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
Route::get('/about', [ArsipController::class, 'about'])->name('arsip.about');

// Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

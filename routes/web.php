<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PhotoController::class, 'index'])->name('gallery.index');
Route::get('/upload', [PhotoController::class, 'create'])->name('gallery.create');
Route::post('/upload', [PhotoController::class, 'store'])->name('gallery.store');
Route::get('/photo/{photo}', [PhotoController::class, 'show'])->name('gallery.show');
Route::get('/photo/{photo}/edit', [PhotoController::class, 'edit'])->name('gallery.edit');
Route::put('/photo/{photo}', [PhotoController::class, 'update'])->name('gallery.update');
Route::get('/photo/{photo}/download', [PhotoController::class, 'download'])->name('gallery.download');
Route::delete('/photo/{photo}', [PhotoController::class, 'destroy'])->name('gallery.destroy');
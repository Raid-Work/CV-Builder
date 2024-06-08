<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;

Route::get('/cv/create', [CVController::class, 'create'])->name('cv.create');
Route::post('/cv', [CVController::class, 'store'])->name('cv.store');
Route::get('/cv/{cv}/download', [CVController::class, 'download'])->name('cv.download');
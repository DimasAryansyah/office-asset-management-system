<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

Route::get('/', fn() => redirect()->route('assets.index'));

Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');

Route::get('/assets/{asset}', [AssetController::class, 'show'])->name('assets.show');

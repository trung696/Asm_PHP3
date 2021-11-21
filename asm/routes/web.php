<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('car')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('car.index');
    Route::get('remove/{id}', [CarController::class, 'remove'])->name('car.remove');

    Route::get('add', [CarController::class, 'addForm'])->name('car.add');
    Route::post('add', [CarController::class, 'saveAdd']);

    Route::get('edit/{id}', [CarController::class, 'editForm'])->name('car.edit');
    Route::post('edit/{id}', [CarController::class, 'saveEdit']);
});

Route::prefix('passenger')->group(function () {
    Route::get('/', [PassengerController::class, 'index'])->name('passenger.index');
    Route::get('remove/{id}', [PassengerController::class, 'remove'])->name('passenger.remove');

    Route::get('add', [PassengerController::class, 'addForm'])->name('passenger.add');
    Route::post('add', [PassengerController::class, 'saveAdd']);

    Route::get('edit/{id}', [PassengerController::class, 'editForm'])->name('passenger.edit');
    Route::post('edit/{id}', [PassengerController::class, 'saveEdit']);
});

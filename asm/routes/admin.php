<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/detail-user/{id}', [UserController::class, 'detail'])->name('user.detail');

    Route::get('remove/{id}', [UserController::class, 'remove'])->middleware('admin-role')->name('user.remove');

    Route::get('add', [UserController::class, 'addForm'])->middleware('admin-role')->name('user.add');
    Route::post('add', [UserController::class, 'saveAdd'])->middleware('admin-role');

    Route::get('edit/{id}', [UserController::class, 'editForm'])->middleware('user-detail-role')->name('user.edit');
    Route::post('edit/{id}', [UserController::class, 'saveEdit'])->middleware('user-detail-role');
    Route::get('/change-password/{id}', [UserController::class, 'changePassword'])->middleware('change-password-role')->name('change-password');
    Route::post('/change-password/{id}', [UserController::class, 'saveChange'])->middleware('change-password-role');
});

Route::prefix('car')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('car.index');
    Route::get('remove/{id}', [CarController::class, 'remove'])->middleware('staff-role')->name('car.remove');

    Route::get('add', [CarController::class, 'addForm'])->middleware('staff-role')->name('car.add');
    Route::post('add', [CarController::class, 'saveAdd'])->middleware('staff-role');

    Route::get('edit/{id}', [CarController::class, 'editForm'])->middleware('staff-role')->name('car.edit');
    Route::post('edit/{id}', [CarController::class, 'saveEdit'])->middleware('staff-role');
});
Route::prefix('passenger')->group(function () {
    Route::get('/', [PassengerController::class, 'index'])->name('passenger.index');
    Route::get('remove/{id}', [PassengerController::class, 'remove'])->middleware('staff-role')->name('passenger.remove');

    Route::get('add', [PassengerController::class, 'addForm'])->middleware('staff-role')->name('passenger.add');
    Route::post('add', [PassengerController::class, 'saveAdd'])->middleware('staff-role');

    Route::get('edit/{id}', [PassengerController::class, 'editForm'])->middleware('staff-role')->name('passenger.edit');
    Route::post('edit/{id}', [PassengerController::class, 'saveEdit'])->middleware('staff-role');
});

Route::any('forbiddance-admin', function () {
    return "Trang n??y danh cho admin, b???n kh??ng c?? quy???n truy c???p";
})->name('forbiddance-admin');

Route::any('forbiddance-staff', function () {
    return "Trang n??y danh cho nh??n vi??n, b???n kh??ng c?? quy???n truy c???p";
})->name('forbiddance-staff');

Route::any('forbiddance-detail', function () {
    return "B???n kh??ng th??? thay ?????i th??ng tin c???a t??i kho???n kh??c";
})->name('forbiddance-detail');

Route::any('forbiddance-change-password', function () {
    return "B???n kh??ng th??? thay ?????i m???t kh???u c???a t??i kho???n kh??c";
})->name('forbiddance-change-password');

Route::resource("users", UserController::class);

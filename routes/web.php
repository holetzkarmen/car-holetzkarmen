<?php
use App\Http\Controllers\Car_MakerController;
use App\Http\Controllers\Car_TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Car_MakerController::class, 'index']);   // kezdőlap, NINCS name()

Route::get('/car_makers', [Car_MakerController::class, 'index'])->name('car_makers.index');
Route::get('/car_makers/create', [Car_MakerController::class, 'create'])->name('car_makers.create');
Route::post('/car_makers', [Car_MakerController::class, 'store'])->name('car_makers.store');
Route::get('/car_makers/{car_maker}/edit', [Car_MakerController::class, 'edit'])->name('car_makers.edit');
Route::patch('/car_makers/{car_maker}', [Car_MakerController::class, 'update'])->name('car_makers.update');
Route::delete('/car_makers/{car_maker}', [Car_MakerController::class, 'destroy'])->name('car_makers.destroy');

Route::get('/car_types', [Car_TypeController::class, 'index'])->name('car_types.index');
Route::get('/car_types/create', [Car_TypeController::class, 'create'])->name('car_types.create');
Route::post('/car_types', [Car_TypeController::class, 'store'])->name('car_types.store');
Route::get('/car_types/{car_type}/edit', [Car_TypeController::class, 'edit'])->name('car_types.edit');
Route::patch('/car_types/{car_type}', [Car_TypeController::class, 'update'])->name('car_types.update');
Route::delete('/car_types/{car_type}', [Car_TypeController::class, 'destroy'])->name('car_types.destroy');
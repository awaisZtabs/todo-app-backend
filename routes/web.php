<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\VehicleTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [RecordsController::class, 'index'])->name('records.index');
    Route::get('/records', [RecordsController::class, 'index'])->name('records.index');
    Route::get('/records/create', [RecordsController::class, 'create'])->name('records.create');
    Route::get('/records/{id}/edit', [RecordsController::class, 'edit'])->name('records.edit');
    Route::put('/records/{id}', [RecordsController::class, 'update'])->name('records.update');
    Route::post('/records', [RecordsController::class, 'store'])->name('records.store');
    Route::delete('/record/{id}', [RecordsController::class, 'destroy'])->name('records.destroy');
    Route::get('/records/pdf/{id}', [RecordsController::class, 'generatePdfLPO'])->name('records.generatePdf');
    Route::get('/records/pdf-without-logo/{id}', [RecordsController::class, 'generatePDFWithoutLogo'])->name('records.generatePDFWithoutLogo');

// Suppliers
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    // Vehicle Types
    Route::get('/vehicle-types', [VehicleTypeController::class, 'index'])->name('vehicle-types.index');
    Route::get('/vehicle-types/create', [VehicleTypeController::class, 'create'])->name('vehicle-types.create');
    Route::post('/vehicle-types', [VehicleTypeController::class, 'store'])->name('vehicle-types.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('product')->name('product.')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{productId}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{productId}', [ProductController::class, 'update'])->name('update');
        Route::get('/deactivate/{productId}', [ProductController::class, 'deactivate'])->name('deactivate');
        // Route::delete('/delete', [ProductController::class, 'destroy'])->name('delete');
    });
});

require __DIR__.'/auth.php';

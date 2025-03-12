<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{productId}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{productId}', [ProductController::class, 'update'])->name('update');
        Route::get('/deactivate/{productId}', [ProductController::class, 'deactivate'])->name('deactivate');
        Route::get('/getOtherProducts', [ProductController::class, 'getOtherProducts'])->name('getOtherProducts');
    });

    Route::prefix('proposals')->name('proposals.')->group(function () {
        Route::prefix('outbound')->name('outbound.')->group(function () {
            Route::get('/listAll', [ProposalController::class, 'index'])->name('index');
            Route::get('/create/{productId}', [ProposalController::class, 'create'])->name('create');
            Route::post('/create/{productId}', [ProposalController::class, 'store'])->name('store');
        });
    });
});

require __DIR__ . '/auth.php';

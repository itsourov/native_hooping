<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\MediaLibrary;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GoogleDriveController;
use App\Http\Controllers\Admin\Bkash\RefundController;
use App\Http\Controllers\Admin\DownloadItemController;
use App\Http\Controllers\Admin\Bkash\TransactionController;





Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::prefix('products')->name('products.')->group(function () {

        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/{product:slug}', [ProductController::class, 'edit'])->name('edit');
        Route::get('/categories/manage', [ProductController::class, 'manageCategories'])->name('categories');
        Route::get('/downloadable/{product:slug}/manage', [DownloadItemController::class, 'index'])->name('manage-downloadables');
    });



    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
        Route::put('/{order}', [OrderController::class, 'update'])->name('update');
    });
    Route::prefix('bkash')->name('bkash.')->group(function () {
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/{bkash_transaction}', [TransactionController::class, 'showtTransaction'])->name('transactions.show');
        Route::delete('/refund/{bkash_transaction}', [RefundController::class, 'refundPaymeent'])->name('refund');

        Route::get('/searchTransaction', [TransactionController::class, 'searchTransaction'])->name('searchTransaction');
        Route::get('/refund-status', [TransactionController::class, 'refundStatus'])->name('refundStatus');

    });
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('index');


    });



});
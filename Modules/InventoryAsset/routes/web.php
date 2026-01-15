<?php

use Illuminate\Support\Facades\Route;
use Modules\InventoryAsset\Http\Controllers\InventoryAssetController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('inventoryassets', InventoryAssetController::class)->names('inventoryasset');
});

Route::get('/contoh', [merkController::class, 'index'])
    ->name('contoh.index');
<?php

use Illuminate\Support\Facades\Route;
use Modules\InventoryAsset\app\Http\Controllers\InventoryAssetController;
use Modules\InventoryAsset\app\Http\Controllers\MerkController;

Route::resource('inventoryassets', InventoryAssetController::class)->names('inventoryasset');

Route::resource('merk', MerkController::class)
    ->only(['index', 'store', 'update', 'destroy']);

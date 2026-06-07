<?php

use App\Http\Controllers\merchant\AuthController;
use App\Http\Controllers\merchant\ColorController;
use App\Http\Controllers\merchant\CoponController;
use App\Http\Controllers\merchant\EngravingController;
use App\Http\Controllers\merchant\HomeController;
use App\Http\Controllers\merchant\OverViewController;
use App\Http\Controllers\merchant\ProductController;
use App\Http\Controllers\merchant\SettingController;
use App\Http\Controllers\merchant\SizeController;
use Illuminate\Support\Facades\Route;

Route::prefix('merchant')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('merchant.login');
        Route::post('/loginCheck', 'loginCheck')->name('merchant.checkLogin');
    });

    Route::middleware('merchant')->group(function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('merchant.Dashboard.index');

        Route::resource('account/overview', OverViewController::class)->names([
            'index' => 'merchant.Overview.index',
            'create' => 'merchant.Overview.create',
            'store' => 'merchant.Overview.store',
            'edit' => 'merchant.Overview.edit',
            'update' => 'merchant.Overview.update',
            'destroy' => 'merchant.Overview.destroy',
        ]);

        route::get('account/settings', [SettingController::class, 'index'])->name('merchant.Settings.index');
        route::patch('account/settings/update', [SettingController::class, 'save'])->name('merchant.Settings.update');

        Route::resource('/products', ProductController::class)->names([
            'index' => 'merchant.Products.index',
            'create' => 'merchant.Products.create',
            'update' => 'merchant.Products.update',
            'destroy' => 'merchant.Products.destroy',
        ]);

        Route::post('/products/store', [ProductController::class, 'store'])->name('merchant.Products.store');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('merchant.Products.edit');
        // Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('merchant.Products.update');

        Route::resource('/AddProduct', ProductController::class)->names([
            'index' => 'merchant.AddProduct.index',
            'create' => 'merchant.AddProduct.create',
            'edit' => 'merchant.AddProduct.edit',
            'update' => 'merchant.AddProduct.update',
            'destroy' => 'merchant.AddProduct.destroy',
        ]);

        Route::resource('/sizes', SizeController::class)->names([
            'index' => 'merchant.Sizes.index',
            'create' => 'merchant.Sizes.create',
            'store' => 'merchant.Sizes.store',
            'edit' => 'merchant.Sizes.edit',
            'update' => 'merchant.Sizes.update',
            'destroy' => 'merchant.Sizes.destroy',
        ]);

        Route::resource('/colors', ColorController::class)->names([
            'index' => 'merchant.Colors.index',
            'create' => 'merchant.Colors.create',
            // 'store' => 'merchant.Colors.store',
            'edit' => 'merchant.Colors.edit',
            'update' => 'merchant.Colors.update',
            'destroy' => 'merchant.Colors.destroy',
        ]);

        Route::post('/colors/store', [ColorController::class, 'store'])->name('merchant.Colors.store');

        Route::resource('/engravings', EngravingController::class)->names([
            'index' => 'merchant.Engravings.index',
            'create' => 'merchant.Engravings.create',
            'store' => 'merchant.Engravings.store',
            'edit' => 'merchant.Engravings.edit',
            'update' => 'merchant.Engravings.update',
            'destroy' => 'merchant.Engravings.destroy',
        ]);

        Route::resource('/copons', CoponController::class)->names([
            'index' => 'merchant.Copons.index',
            'create' => 'merchant.Copons.create',
            'store' => 'merchant.Copons.store',
            'edit' => 'merchant.Copons.edit',
            'update' => 'merchant.Copons.update',
            'destroy' => 'merchant.Copons.destroy',
        ]);

        Route::post('/copons/store', [CoponController::class, 'store'])->name('merchant.Copons.store');

    });
});

<?php

use App\Http\Controllers\admin\AdsController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\IntroController;
use App\Http\Controllers\admin\MerchantController;
use App\Http\Controllers\admin\OverViewController;
use App\Http\Controllers\admin\PaymentMethodController;
use App\Http\Controllers\admin\RequestUpgradeMerchantController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\StatisticController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\admin\SubscriptionController;
use App\Http\Controllers\admin\UserController;
use App\Models\category;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('admin.login');
        Route::post('/loginCheck', 'loginCheck')->name('checkLogin');
    });

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.Dashboard.index');

        Route::resource('account/overview', OverViewController::class)->names([
            'index' => 'admin.Overview.index',
            'create' => 'admin.Overview.create',
            'store' => 'admin.Overview.store',
            'edit' => 'admin.Overview.edit',
            'update' => 'admin.Overview.update',
            'destroy' => 'admin.Overview.destroy',
        ]);

        route::get('account/settings', [SettingController::class, 'index'])->name('admin.Settings.index');
        route::patch('account/settings/update', [SettingController::class, 'save'])->name('admin.Settings.update');

        Route::resource('/users', UserController::class)->names([
            'index' => 'admin.Users.index',
            'create' => 'admin.Users.create',
            //        "store" => "admin.Users.store",
            'edit' => 'admin.Users.edit',
            'update' => 'admin.Users.update',
            'destroy' => 'admin.Users.destroy',
        ]);

        Route::post('/users/store', [UserController::class, 'store'])->name('admin.Users.store');

        Route::get('/users/view/{id}', [UserController::class, 'show'])->name('admin.Users.view');

        Route::resource('/merchants', MerchantController::class)->names([
            'index' => 'admin.Merchants.index',
            'create' => 'admin.Merchants.create',
            //        "store" => "admin.Merchants.store",
            'edit' => 'admin.Merchants.edit',
            'update' => 'admin.Merchants.update',
            'destroy' => 'admin.Merchants.destroy',
        ]);

        Route::post('/merchants/store', [MerchantController::class, 'store'])->name('admin.Merchants.store');

        Route::get('/merchants/view/{id}', [MerchantController::class, 'show'])->name('admin.Merchants.view');

        Route::patch('/merchants/update/{id}', [MerchantController::class, 'update'])->name('admin.Merchants.update');

        Route::resource('/update_to_merchant', RequestUpgradeMerchantController::class)->names([
            'index' => 'admin.update_to_merchant.index',
            'create' => 'admin.update_to_merchant.create',
            'store' => 'admin.update_to_merchant.store',
            'edit' => 'admin.update_to_merchant.edit',
        ]);

        Route::get('/update_to_merchant/view/{id}', [RequestUpgradeMerchantController::class, 'show'])->name('admin.update_to_merchant.view');

        Route::get('/update_to_merchant/update/{id}', [RequestUpgradeMerchantController::class, 'update'])->name('admin.update_to_merchant.update');

        Route::get('/update_to_merchant/destroy/{id}', [RequestUpgradeMerchantController::class, 'destroy'])->name('admin.update_to_merchant.destroy');

        Route::resource('/categories', CategoryController::class)->names([
            'index' => 'admin.Categories.index',
            'create' => 'admin.Categories.create',
            //        "store" => "admin.Categories.store",
            'edit' => 'admin.Categories.edit',
            'update' => 'admin.Categories.update',
            'destroy' => 'admin.Categories.destroy',
        ]);

        Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.Categories.store');

        Route::resource('/intros', IntroController::class)->names([
            'index' => 'admin.Intros.index',
            'create' => 'admin.Intros.create',
            'edit' => 'admin.Intros.edit',
            'update' => 'admin.Intros.update',
            'destroy' => 'admin.Intros.destroy',
        ]);

        Route::post('/intros/store', [IntroController::class, 'store'])->name('admin.Intros.store');

        Route::resource('/ads', AdsController::class)->names([
            'index' => 'admin.Ads.index',
            'create' => 'admin.Ads.create',
            'store' => 'admin.Ads.store',
            'edit' => 'admin.Ads.edit',
            'update' => 'admin.Ads.update',
            'destroy' => 'admin.Ads.destroy',
        ]);

        Route::resource('/statistics', StatisticController::class)->names([
            'index' => 'admin.Statistics.index',
            'create' => 'admin.Statistics.create',
            // 'store' => 'admin.Statistics.store',
            'edit' => 'admin.Statistics.edit',
            'update' => 'admin.Statistics.update',
            'destroy' => 'admin.Statistics.destroy',
        ]);

        Route::post('/statistics/store', [StatisticController::class, 'store'])->name('admin.Statistics.store');

        Route::resource('/stores', StoreController::class)->names([
            'index' => 'admin.Stores.index',
            'create' => 'admin.Stores.create',
            'store' => 'admin.Stores.store',
            'edit' => 'admin.Stores.edit',
            'update' => 'admin.Stores.update',
            'destroy' => 'admin.Stores.destroy',
        ]);

        Route::resource('/subscription', SubscriptionController::class)->names([
            'index' => 'admin.Subscription.index',
            'create' => 'admin.Subscription.create',
            'store' => 'admin.Subscription.store',
            'edit' => 'admin.Subscription.edit',
            'update' => 'admin.Subscription.update',
            'destroy' => 'admin.Subscription.destroy',
        ]);

        Route::resource('/features', FeatureController::class)->names([
            'index' => 'admin.Features.index',
            'create' => 'admin.Features.create',
            'store' => 'admin.Features.store',
            'edit' => 'admin.Features.edit',
            'update' => 'admin.Features.update',
            'destroy' => 'admin.Features.destroy',
        ]);

        Route::resource('/contact', ContactController::class)->names([
            'index' => 'admin.Contact.index',
            'create' => 'admin.Contact.create',
            'store' => 'admin.Contact.store',
            'edit' => 'admin.Contact.edit',
            'update' => 'admin.Contact.update',
            'destroy' => 'admin.Contact.destroy',
        ]);

        Route::resource('/FeaturedWorks', UserController::class)->names([
            'index' => 'admin.FeaturedWorks.index',
            'create' => 'admin.FeaturedWorks.create',
            'store' => 'admin.FeaturedWorks.store',
            'edit' => 'admin.FeaturedWorks.edit',
            'update' => 'admin.FeaturedWorks.update',
            'destroy' => 'admin.FeaturedWorks.destroy',
        ]);

        Route::resource('/notification', UserController::class)->names([
            'index' => 'admin.Notification.index',
            'create' => 'admin.Notification.create',
            'store' => 'admin.Notification.store',
            'edit' => 'admin.Notification.edit',
            'update' => 'admin.Notification.update',
            'destroy' => 'admin.Notification.destroy',
        ]);

        Route::resource('/PaymentMethods', PaymentMethodController::class)->names([
            'index' => 'admin.Payment_Methods.index',
            'create' => 'admin.Payment_Methods.create',
            'store' => 'admin.Payment_Methods.store',
            'edit' => 'admin.Payment_Methods.edit',
            'update' => 'admin.Payment_Methods.update',
            'destroy' => 'admin.Payment_Methods.destroy',
        ]);

        route::get('/add', function () {
            $data['fields'] = Category::get_Fields();

            return view('admin.layout.form', $data);
        });
    });
});

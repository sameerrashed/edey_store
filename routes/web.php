<?php

require __DIR__.'/admin.php';
require __DIR__.'/merchant.php';

use App\Http\Controllers\website\AccountController;
use App\Http\Controllers\website\AuthController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'signup'])->name('signup');
Route::post('/register', [AuthController::class, 'create'])->name('signup.post');
Route::get('/login', [AuthController::class, 'login'])->name('website.login');
Route::post('/login', [AuthController::class, 'loginCheck'])->name('login.post');

Route::middleware('user')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.details');
    Route::get('/product/addfavorites/{id}', [ProductController::class, 'addFavorites'])->name('product.addFavorites');
    Route::get('/favorites/{id}', [ProductController::class, 'favorites'])->name('products.favorites');
    Route::get('/favorites/delete/{id}', [ProductController::class, 'deletefavorites'])->name('products.favorites.delete');
    Route::get('/cart/{id}', [CartController::class, 'index'])->name('products.cart');
    Route::get('/cart/add/{id}', [CartController::class, 'store'])->name('products.cart.store');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout.post');
    Route::get('/account/details', [AccountController::class, 'index'])->name('account.index');
    Route::post('/account/details/update', [AccountController::class, 'update'])->name('account.update');
    Route::get('/account/upgrade', [AccountController::class, 'updateToMerchant'])->name('account.upgrade');
    Route::post('/account/upgrade/post', [AccountController::class, 'updateToMerchantPost'])->name('account.upgrade.post');
});

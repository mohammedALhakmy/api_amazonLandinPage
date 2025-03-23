<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AddressOptionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/cart', function () {
    return Inertia::render('Cart');
})->name('cart.index');

Route::get('/category/{id}',[CategoryController::class,'index'])->name('category.index');
Route::get('/product/{id}',[ProductController::class,'index'])->name('product.index');
Route::get('/address',[AddressController::class,'index'])->name('address.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckOutController::class, 'store'])->name('checkout.store');
    Route::put('/checkout', [CheckOutController::class, 'update'])->name('checkout.update');
});

Route::prefix("address_options")->controller(AddressOptionsController::class)->name('address_options.')->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::post('/update/{id}', 'update');
    Route::get('/delete/{id?}', 'destroy')->name('destroy');
});

Route::get('/CheckOutSuccess', function () {
    return Inertia::render('CheckoutSuccess');
})->name('checkout_success.index');

require __DIR__.'/auth.php';
// npm i vue-material-design-icons
// php artisan make:controller Api/SettingController --invokable
// php  artisan make:resource SettingResource
// jwt => json web token
// Laravel Sanctum
// npm i vue3-carousel
//Mohammedalhakami2023
//npm i pinia this package the shopping cart in vue laravel
// npm i pinia-plugin-persistedstate this package the shopping cart in vue laravel
// number => 4111 1111 1111 1111 expire => 12/30 cvv => 123
//npm install --save vue-toastification
//Remove-Item -Recurse -Force node_modules

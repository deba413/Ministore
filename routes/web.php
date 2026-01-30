<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('admin/login', function () {
    return view('admin-panel.login');
})->name('login');



// Route::get('/shop', function () {
//     return view('shop');
// })->name('shop');

Route::get('/shop',[HomeController::class,'shop'])->name('shop');


Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');


Route::get('/product-details', function () {
    return view('product-details');
})->name('product-details');



Route::get('admin/register', [RegisterController::class, 'create'])->name('admin.register');
Route::post('admin/store', [RegisterController::class, 'register'])->name('admin.store');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('dashboard', function () {
    return view('admin-panel.dashboard');
    })->name('dashboard');

    Route::get('users/list', [UserController::class, 'index'])->name('users.list');
   
    Route::prefix('products')->group(function () {
    Route::get('list', [ProductController::class, 'index'])->name('products.list');
    Route::get('create', [ProductController::class, 'create'])->name('products.create');
    Route::post('store', [ProductController::class, 'store'])->name('products.store');
    });

});


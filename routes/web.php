<?php

use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Hais;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\CartController;


Route::get('/products/{id}', [ProductController::class, 'ShowClicked'])->name('products.show');

Route::get('/meals', [ProductController::class, 'show'])->name('meals');
Route::get('Signup', [SignupController::class, 'SignupForm'])->name('Signup');
Route::post('/Signup', [SignupController::class, 'signup']);

Route::get('login', [LoginController::class, 'LoginForm'])->name('login');


Route::get('/home', function(){
    return view('home');
})->name('home');

//Cart Route
Route::post('/addToCart/{id}', [CartController::class, 'addtocart'])
->middleware('auth')
->name('addCart');


Route::get('/carts', [CartController::class, 'showToCart'])->name('cart');
Route::post('/carts', [CartController::class, 'showToCart']);
Route::get('cart/total', [CartController::class, 'total']);

Route::post('/decreaseCartQuantity/{id}', [CartController::class, 'decreaseCartQuantity']);
Route::post('/addCartQuantity/{id}',[CartController::class, 'addCartQuantity']);
Route::post('/removeFromCart/{id}',[CartController::class, 'removeFromCart']);

Route::get('/layout', [CartController::class, 'show_cart']);

//Login & Logout
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect(route('login'));
})->name('logout');


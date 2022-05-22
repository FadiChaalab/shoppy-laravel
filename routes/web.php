<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::get('/recover', [UserController::class, 'recover'])->name('recover')->middleware('guest');

Route::get('/home', [UserController::class, 'home'])->name('home')->middleware('auth');

Route::get('/calendar', [UserController::class, 'calendar'])->name('calendar')->middleware('auth');

Route::post('/login_post', [UserController::class, 'login_post'])->middleware('guest');

Route::post('/register_post', [UserController::class, 'register_post'])->middleware('guest');

Route::post('/recover', [UserController::class, 'recover_post'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/add_product', [ProductController::class, 'create'])->name('add_product')->middleware('auth');

Route::post('/add_product_post', [ProductController::class, 'store'])->name('add_product_post')->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('auth');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.edit')->middleware('auth');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');

Route::get('/users/home', [UserController::class, 'user_home'])->name('users.home')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::put('/profile/image/{id}', [UserController::class, 'update_image'])->name('profile.update.image')->middleware('auth');

Route::put('/profile/{id}', [UserController::class, 'update_profile'])->name('profile.update')->middleware('auth');

Route::get('/users', [UserController::class, 'users'])->name('users')->middleware('auth');

Route::delete('/users/{id}', [UserController::class, 'delete_user'])->name('user.destroy')->middleware('auth');

Route::get('/users/products/{id}', [ProductController::class, 'detail'])->name('user.product')->middleware('auth');

Route::get('/users/profile', [UserController::class, 'user_profile'])->name('user.profile')->middleware('auth');

Route::put('/users/products/{id}', [ProductController::class, 'add_to_cart'])->name('user.product.cart')->middleware('auth');

Route::delete('/users/products/{id}', [ProductController::class, 'delete_cart_item'])->name('user.product.remove')->middleware('auth');

Route::post('/users/home/checkout', [ProductController::class, 'checkout'])->name('user.cart.checkout')->middleware('auth');

Route::post('/users/home/contact', [UserController::class, 'contact_post'])->name('user.contact')->middleware('auth');

Route::get('/contact', [UserController::class, 'contact'])->name('contact')->middleware('auth');

Route::get('/contacts/{id}', [UserController::class, 'show_contact'])->name('contact.read')->middleware('auth');
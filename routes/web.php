<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

//
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/add_product', [AdminController::class, 'add_product']);
Route::post('/product_added', [AdminController::class, 'product_added']); //product added from add product
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
Route::post('/product_edited/{id}', [AdminController::class, 'product_edited']); //product edit  from edit product
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cartitem/{id}', [HomeController::class, 'remove_cartitem']);
Route::get('/cash_pay', [HomeController::class, 'cash_pay']);

Route::get('/stripe_payment', [HomeController::class, 'stripePayment']);
Route::post('stripe', [HomeController::class, 'stripePost'])->name('stripe.post');
});

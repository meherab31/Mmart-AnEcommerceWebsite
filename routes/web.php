<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

//No auth Needed
Route::get('/', [HomeController::class, 'index']);
Route::get('/about_us', [HomeController::class, 'aboutUs'])->name('about.us');
Route::get('/contact_us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::get('/shop', [HomeController::class, 'shop'])->name('shop.filter');

Route::get('/search', [HomeController::class, 'search'])->name('product.search');
Route::post('/contact_submit', [ContactController::class, 'contactSubmit'])->name('contact.submit');
Route::post('/discount', [ContactController::class, 'discount'])->name('discount');
//
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified')->name('admin_dash');
    Route::get('/view_category', [AdminController::class, 'view_category']);
    Route::post('/add_category', [AdminController::class, 'add_category']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
    Route::get('/add_product', [AdminController::class, 'add_product']);
    Route::post('/product_added', [AdminController::class, 'product_added']); //product added from add product
    Route::get('/show_product', [AdminController::class, 'show_product']);
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('/edit_product/{id}', [AdminController::class, 'edit_product']);
    Route::post('/product_edited/{id}', [AdminController::class, 'product_edited']); //product edit  from edit product
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->middleware('auth');
    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
    Route::get('/remove_cartitem/{id}', [HomeController::class, 'remove_cartitem']);
    Route::get('/cash_pay', [HomeController::class, 'cash_pay']);
    Route::get('/stripe_payment', [HomeController::class, 'stripePayment']);
    Route::post('stripe', [HomeController::class, 'stripePost'])->name('stripe.post');
    Route::get('/show_orders', [AdminController::class, 'showOrders']);
    Route::get('/delivery/{id}', [AdminController::class, 'delivery']);
    Route::post('/delivery/{id}', [AdminController::class, 'delivery']);
    Route::get('/sales_report', [AdminController::class, 'downloadReport'])->name('sales_report');
    Route::get('/reciept/{id}', [AdminController::class, 'orderReciept']);
    Route::get('/send_email/{id}', [AdminController::class, 'sendEmail']);
    Route::post('/email_sent/{id}', [AdminController::class, 'sentEmail']);
    Route::get('/get_in_touch', [AdminController::class, 'getInTouch']);
    Route::get('/my_orders', [HomeController::class, 'myOrders']);
    Route::get('/cancel_order/{id}', [HomeController::class, 'cancelOrder']);
    Route::post('/product/{productId}/review', [ReviewController::class, 'store'])->name('review.store')->middleware('auth');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy')->middleware('auth');

});

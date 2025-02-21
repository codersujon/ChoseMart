<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthLogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\OrderManageController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserController;
use App\Models\ProductCart;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
// Products 
Route::get('/product', [ProductController::class,'index'])->name('products.index');
Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-store',[ProductController::class,'store'])->name('product.store');
Route::put('/product-update/{id}',[ProductController::class,'update'])->name('products.update');
Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::DELETE('/product-delete/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// user create 
Route::get('/all-user',[UserController::class,'AllUser'])->name('allUser');
Route::get('/admin-resistration',[AuthController::class,'Resistration'])->name('admin.resistration');
Route::post('/register', [AuthController::class, 'register'])->name('admin.confirm.resistration');
Route::get('/orderList',[OrderListController::class,'orderList'])->name('order.list');
Route::get('/logout', [AuthLogoutController::class, 'logout'])->name('logout');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// invoice 
Route::post('/invoices/{id}/update-status', [InvoiceController::class,'updateStatus'])->name('invoices.update-status');
Route::get('/order-confirm',[AuthController::class,'ConfirmOrder'])->name('order-confirm');

});

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/product-details/{id}',[HomeController::class,'showProduct'])->name('product.show');
Route::get('/CheckoutPage',[HomeController::class,'CheckoutPage'])->name('product.checkout');

// Add To Cart 
Route::post('/addToChart',[ProductCartController::class,'addToChart'])->name('addToChart');
Route::post('/update-quantity', [ProductCartController::class, 'updateQuantity'])->name('update-quantity');
Route::delete('/delete/item', [ProductCartController::class,'deleteItem'])->name('delete.item');
Route::post('/placeOrder', [InvoiceController::class,'create'])->name('placeOrder');


// Route::post('/mobile_verification', [InvoiceController::class,'verifyOtp'])->name('verify.otp'); // FOR OTP

// Login 
Route::get('/admin-login',[AuthController::class,'index'])->name('admin.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/get-shipping-charge', [ShippingController::class, 'getShippingCharge']);

// About ANd COntact 
Route::get('/about-us',[AboutController::class,'index'])->name('about.index');
Route::get('/contact-us',[ContactController::class,'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact');
Route::get('/invoice-product/{id}',[InvoiceController::class,'invoiceProduct'])->name('invoiceProduct');

// Total pending Order
Route::get('/return-order',[OrderManageController::class,'ReturnOrder'])->name('returnOrder');
Route::get('/pending-order',[OrderManageController::class,'PendingOrder'])->name('pendingOrder');
Route::get('/proccesing-order',[OrderManageController::class,'ProccesingOrder'])->name('proccesingOrder');
Route::get('/cencel-order',[OrderManageController::class,'CencelOrder'])->name('cencelOrder');
Route::get('/completed-order',[OrderManageController::class,'CompletedOrder'])->name('completedOrder');
Route::get('/delevary-order',[OrderManageController::class,'DelivaryOrder'])->name('delivaryOrder');


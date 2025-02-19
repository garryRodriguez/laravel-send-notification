<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PayPalController;
use App\Mail\TestMail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-mail', function(){
    Mail::to('kredoteacher.grodriguez@gmail.com')->send(new TestMail());
    return "Test mail sent!";
});

Route::get('/pay-invoice/{user_id}/{amount}', [InvoiceController::class, 'payInvoice']);
Route::get('paypal', [PayPalController::class, 'index']);
Route::post('paypal/create', [PayPalController::class, 'createPayment']);
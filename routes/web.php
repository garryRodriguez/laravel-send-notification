<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\InvoiceController;
use App\Mail\TestMail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-mail', function(){
    Mail::to('kredoteacher.grodriguez@gmail.com')->send(new TestMail());
    return "Test mail sent!";
});

Route::get('/pay-invoice/{user_id}/{amount}', [InvoiceController::class, 'payInvoice']);
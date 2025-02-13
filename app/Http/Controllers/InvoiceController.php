<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Nofitications\InvoicePaid;

class InvoiceController extends Controller
{
    public function payInvoice(){
        $user = User::find(1); // Assume user with id 1
        $amount = 100; //invoice amount

        /**
         * send the notification
         */
        $user->notify(new InvoicePaid($amount));
        return response()->json(['message' => 'Invoice paid and notification sent!']);
    }
}

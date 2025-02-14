<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\InvoicePaid;

class InvoiceController extends Controller
{
    public function payInvoice($userId, $amount){
        $user = User::find($userId); // Assume user with id 1

        if ($user) {
             /**
             * send the notification
             */
            $user->notify(new InvoicePaid($amount));
            return response()->json(['message' => 'Invoice paid and notification sent!']);     
        }

        return response()->json(['error' => 'User not found!'], 404);

       
    }
}

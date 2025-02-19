<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;

class PayPalController extends Controller
{
    protected $paypalService;

    // Inject PayPalService into controller
    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    // Display a list of PayPal payments
    public function index(Request $request)
    {
        $payments = $this->paypalService->getPayments();  // Fetch payments
        return view('paypal.index', compact('payments'));
    }

    // Create a new payment (redirects to PayPal)
    public function createPayment(Request $request)
    {

        /**
         *  You may add a view (blade) to handle how much to pay and pass that request to createPayment method
         */
        $amount = 10.00;  // Set the amount for the payment
        $payment = $this->paypalService->createPayment($amount);  // Create payment
        dd($payment);
        // if ($payment) {
        //     // Redirect to PayPal approval URL
        //     foreach ($payment->getLinks() as $link) {
        //         if ($link->getRel() == 'approval_url') {
        //             return redirect()->away($link->getHref());
        //         }
        //     }
        // }

        // return redirect()->back()->withErrors('Payment creation failed');
    }

}

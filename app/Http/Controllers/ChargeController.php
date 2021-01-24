<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class ChargeController extends Controller
{
    //
    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create([
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken,
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => floor($request->sum_price),
                'currency' => 'jpy',
                'description' => 'laravel_test',
            ]);

            return redirect('/order/complete');
            // return header("Location: http://localhost:8000");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

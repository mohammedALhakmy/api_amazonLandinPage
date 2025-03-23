<?php

namespace App\Http\Controllers;

use App\Mail\OrderShippingMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class CheckOutController extends Controller
{

    public function index()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51PjnhORtsizW0a8cvbYYf1dSbMJWryzV8OU24qDoNkG9V6VllEHMdNJeXvLEZH540mz1Q93SWJ9gRSCjAMJcnU3X000mehBzWZ');
        $order = Order::where('user_id','=',auth()->user()->id)->where("payment_method",null)->first();
//        if (is_null($order)){
//            return redirect()->route('checkout_success.index');
//        }

        $intent = $stripe->paymentIntents->create([
           'currency' => 'usd',
            'payment_method_types' => ['card'],
            'amount' => (int) $order->total,
//            'amount' => 1000,
        ]);

        return Inertia::render('Checkout',[
            'intent' => $intent,
            'order' => $order
        ]);
    }

    public function store(Request $request)
    {
         $res = Order::where('user_id','=',auth()->user()->id)->where("payment_method",null)->first();
         if (!is_null($res)){
             $res->total = $request->total;
             $res->total_decimal = $request->total_decimal;
             $res->items = json_encode($request->items);
             $res->save();
         }else{
             $order = new Order();
             $order->user_id = auth()->user()->id;
             $order->total = $request->total;
             $order->total_decimal = $request->total_decimal;
             $order->items = json_encode($request->items);
             $order->save();
         }

         return redirect()->route('checkout.index');
    }

    public function update(Request $request)
    {
        $order = Order::where('user_id','=',auth()->user()->id)->where("payment_method",null)->first();
        $order->payment_method = $request['payment_intent'];
        $order->save();
        Mail::to($request->user())->send(new OrderShippingMail($order));
        return redirect()->route('checkout_success.index');
    }

    public function destroy(string $id)
    {
        //
    }
}

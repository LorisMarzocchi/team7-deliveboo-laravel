<?php

namespace App\Http\Controllers\Api;

use App\Models\Guest;
use App\Models\Order;
use Braintree\Gateway;
use App\Models\Product;
use App\Mail\MailToAdmin;
use App\Mail\MailToGuest;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PaymentRequest;

class OrderController extends Controller
{
    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {
        $total_price = 0;
        $data        = $request->all();
        $cart        = $data['cart'];
        $shipping    = 4.9;

        foreach ($cart as $item) {
            $product = Product::where('id', $item['id'])->first();
            $total_price += $product->price * $item['qnt'];
        }
        $total_price += $shipping;


        $result = $gateway->transaction()->sale([
            'amount'                    => $total_price,
            'paymentMethodNonce'        => $request->token,
            'options' => [
                'submitForSettlement'   => true
            ]
        ]);
        // Log::info(json_encode($result)); cartella storage-log
        if ($result->success) {
            $order = Order::create([
                'total_price'       => $total_price,
                'restaurant_id'     => $data['restaurant_id'],
                'name'              => $data['name'],
                'surname'           => $data['surname'],
                'email'             => $data['email'],
                'message'           => $data['message'],
                'payment_date'      => now()->addHours(2),
            ]);

            foreach ($cart as $item) {
                $orderProduct = OrderProduct::create([
                    'order_id'          => $order->id,
                    'product_id'        => $item['id'],
                    'product_quantity'  => $item['qnt'],
                ]);
            }

            if ($order && $orderProduct) {
                Guest::create([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'message' => $data['message'],
                ]);

                Mail::to($order->email)->send(new MailToGuest($order));

                Mail::to(env('ADMIN_ADDRESS', 'admin@deliveboo.com'))->send(new MailToAdmin($order));
            }



            return response()->json(['success' => true, 'message' => 'Transazione eseguita con successo.'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Transazione fallita.'], 401);
        }
    }


    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }
}

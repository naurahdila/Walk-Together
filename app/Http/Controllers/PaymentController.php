<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Data transaksi
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(), // ID unik untuk pesanan
                'gross_amount' => $request->input('product_price'), // Total harga
            ],
            'customer_details' => [
                'first_name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
            ],
            'item_details' => [
                [
                    'id' => $request->input('product_id'),
                    'price' => $request->input('product_price'),
                    'quantity' => 1,
                    'name' => $request->input('product_name'),
                ],
            ],
        ];

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Kirim Snap Token ke view
        return view('payment.snap', compact('snapToken'));
    }
}

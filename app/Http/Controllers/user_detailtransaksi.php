<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class user_detailtransaksi extends Controller
{
   
    
    public function index()
    {
        $userId = Auth::id(); 
        
        $transactions = DB::table('transaction_history')
            ->where('user_id', $userId)
            ->select('id', 'transaction_type', 'product_name', 'product_price', 'name', 'created_at', 'status_pembayaran')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('user.detailtransaksi', compact('transactions'));
    }


    public function pay(Request $request, $transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);
    
        // Data untuk Snap Token
        $snapData = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->product_price, // Harga produk
            ],
            'customer_details' => [
                'first_name' => $transaction->name,
                'email' => $transaction->email,
            ],
        ];
    
        // Panggil library Midtrans untuk mendapatkan Snap Token
        \Midtrans\Config::$serverKey = 'YOUR_SERVER_KEY';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    
        $snapToken = \Midtrans\Snap::getSnapToken($snapData);
    
        return response()->json(['snapToken' => $snapToken]);
    }
    
}

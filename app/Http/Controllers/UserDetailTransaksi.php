<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionHistory;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class UserDetailTransaksi extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $transactions = DB::table('transaction_history')
            ->where('user_id', $userId)
            ->select('id', 'transaction_type', 'product_name', 'product_price', 'name', 'snap_token', 'created_at', 'status_pembayaran')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.detailtransaksi', compact('transactions'));
    }

    public function createPaymentToken(Request $request, $id)
    {
        
        $transaction = TransactionHistory::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        
        Config::$serverKey = 'SB-Mid-server-LsXUHP_sNBfC19yw6CjzcNg0';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        
        $params = [
            'transaction_details' => [
                'order_id' => 'TRANSACTION-' . $transaction->id,
                'gross_amount' => $transaction->product_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return response()->json([
            'snapToken' => $snapToken,  
            'message' => 'Token pembayaran berhasil dihasilkan.',
            'status' => true  
        ]);

        $userId = Auth::id();
        $transactions = DB::table('transaction_history')
            ->where('user_id', $userId)
            ->select('id', 'transaction_type', 'product_name', 'product_price', 'name', 'snap_token', 'created_at', 'status_pembayaran')
            ->orderBy('created_at', 'desc')
            ->get();

          
    
        return view('user.detailtransaksi', compact('transactions', 'snapToken'));
    
       
    }



public function updateStatusPembayaran()
{
    DB::table('transaction_history')->update(['status_pembayaran' => 'dibayar']);
    return response()->json(['message' => 'Semua status pembayaran berhasil diperbarui menjadi "dibayar".']);
}
}

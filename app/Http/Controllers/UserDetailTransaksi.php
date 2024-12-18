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
        // Cari transaksi berdasarkan ID
        $transaction = TransactionHistory::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-LsXUHP_sNBfC19yw6CjzcNg0';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data transaksi untuk Midtrans
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
            'snapToken' => $snapToken,  // Mengirim data snap_token ke frontend
            'message' => 'Token pembayaran berhasil dihasilkan.',
            'status' => true  // Status untuk indikasi berhasil
        ]);

        $userId = Auth::id();
        $transactions = DB::table('transaction_history')
            ->where('user_id', $userId)
            ->select('id', 'transaction_type', 'product_name', 'product_price', 'name', 'snap_token', 'created_at', 'status_pembayaran')
            ->orderBy('created_at', 'desc')
            ->get();

          
    
        // // Kirim semua variabel ke view
        return view('user.detailtransaksi', compact('transactions', 'snapToken'));
    
        // return view('user.detailtransaksi', ['snapToken' => $snapToken]);

        // try {
        //     // Generate Snap Token
        //     $snapToken = Snap::getSnapToken($params);
        //     $transaction->snap_token = $snapToken;
        //     $transaction->save();
        
        //     return $snapToken; // Return the Snap Token directly
        // } catch (\Exception $e) {
        //     // Handle the exception (e.g., log the error and return an appropriate response)
        //     \Log::error('Error generating Snap Token: ' . $e->getMessage());
        //     return response('Gagal membuat Snap Token', 500);
        // }
    }

    public function handleNotification(Request $request)
{
    // Konfigurasi Midtrans
    Config::$serverKey = 'SB-Mid-server-LsXUHP_sNBfC19yw6CjzcNg0';
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    try {
        // Ambil data notifikasi dari Midtrans
        $notification = new Notification();
        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        // Cari transaksi berdasarkan Order ID
        $transaction = TransactionHistory::where('order_id', $orderId)->first();

        // Jika transaksi tidak ditemukan, kirim respons error
        if (!$transaction) {
            Log::warning("Transaksi dengan Order ID {$orderId} tidak ditemukan.");
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Perbarui status transaksi berdasarkan status dari Midtrans
        DB::beginTransaction();

        if ($transactionStatus == 'settlement') {
            // Status pembayaran berhasil
            $transaction->status_pembayaran = 'Sudah Dibayar';
            Log::info("Transaksi dengan Order ID {$orderId} diselesaikan (settlement).");
        } elseif ($transactionStatus == 'pending') {
            // Pembayaran masih menunggu konfirmasi
            $transaction->status_pembayaran = 'tertunda';
            Log::info("Transaksi dengan Order ID {$orderId} masih dalam status pending.");
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            // Pembayaran dibatalkan atau gagal
            $transaction->status_pembayaran = 'dibatalkan';
            Log::info("Transaksi dengan Order ID {$orderId} dibatalkan.");
        }

        // Simpan perubahan status transaksi
        $transaction->save();

        // Komit perubahan jika tidak ada kesalahan
        DB::commit();

        // Kembalikan respons sukses ke Midtrans
        return response()->json(['message' => 'Notification handled successfully'], 200);
    } catch (\Exception $e) {
        // Rollback jika terjadi kesalahan
        DB::rollBack();
        Log::error('Error handling Midtrans notification: ' . $e->getMessage());
        return response()->json(['message' => 'Internal server error'], 500);
    }
}


public function updateStatusPembayaran()
{
    DB::table('transaction_history')->update(['status_pembayaran' => 'dibayar']);
    return response()->json(['message' => 'Semua status pembayaran berhasil diperbarui menjadi "dibayar".']);
}
}

<?php 
namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;
use App\Models\TransactionHistory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class process_registration extends Controller
{
    public function detailBeasiswa()
    {
        return view('beasiswa.detail_beasiswa');
    }

    public function dashboard()
    {
        return view('layout.main');
    }

    public function showProduct($category)
    {
        // Ambil semua produk dari database
        $products = DB::table('products')->where('kategori', $category)->get();

        // Kirim data produk ke view
        return view('beasiswa.detail_beasiswa', compact('products'));
    }

    public function showlomba($category)
    {
        // Ambil semua produk dari database
        $products = DB::table('products')->where('kategori', $category)->get();

        // Kirim data produk ke view
        return view('lomba.detail_lomba', compact('products'));
    }

    public function showfreshgraduate($category)
    {
        // Ambil semua produk dari database
        $products = DB::table('products')->where('kategori', $category)->get();

        // Kirim data produk ke view
        return view('freshgraduate.detail_freshgraduate', compact('products'));
    }

    public function showmagang($category)
    {
        // Ambil semua produk dari database
        $products = DB::table('products')->where('kategori', $category)->get();

        // Kirim data produk ke view
        return view('magang.detail_magang', compact('products'));
    }

    public function showmapres($category)
    {
        // Ambil semua produk dari database
        $products = DB::table('products')->where('kategori', $category)->get();

        // Kirim data produk ke view
        return view('mapres.detail_mapres', compact('products'));
    }

    public function store(Request $request)
    {

       
        // Validasi input terlebih dahulu
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        // Ambil ID pengguna yang login
        $userId = Auth::id();

        // Simpan transaksi di database
        $transactions = TransactionHistory::create([
            'transaction_type' => 'Pembelian Produk',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $userId,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'snap_token' => null,
            'order_id' => null,
            'status_pembayaran' => 'belum dibayar',
        ]);

        // dd($transactions);

        // Generate order_id berdasarkan ID transaksi
        $order_id = $transactions->id;
       

        // Update kolom order_id di database
        $transactions->update(['order_id' => $order_id]);

        // dd($transactions->id);  

        // Kembalikan respons JSON
        return response()->json(['transactionId' => $transactions->id, 'message' => 'Transaksi disimpan.']);
        // return view(user.detailtransaksi)
        // return redirect()->route('user.detailtransaksi')->with('transactions', $transactions);
    }

    public function getSnapToken(Request $request, $id)
    {
        $id = $request->input('id');
        
        // Ambil data transaksi
        $transaction = TransactionHistory::findOrFail($id);

        if (!$transaction) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }
      
        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-LsXUHP_sNBfC19yw6CjzcNg0'; // Server Key dari Midtrans
        Config::$isProduction = false; // Ubah ke true jika di production
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat parameter untuk Snap API
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->product_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->name,
                'email' => $transaction->email ?? 'user@example.com',
                'phone' => $transaction->phone ?? '08123456789',
            ],
            'item_details' => [
                [
                    'price' => $transaction->product_price,
                    'quantity' => 1,
                    'name' => $transaction->product_name,
                ],
            ],
        ];
        // dd($params); 

       
        try {
            // Generate Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    
            // Simpan snap_token ke dalam tabel
            $transaction->snap_token = $snapToken;
            $transaction->save();

            dd($request->token);
    
            return response()->json([
                'snap_token' => $snapToken,
                'message' => 'Snap token berhasil di-generate dan disimpan.',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mendapatkan Snap Token: ' . $e->getMessage()], 500);
        }
       
    }

    public function handlenotification(Request $request)
    {
        // Tangkap notifikasi dari Midtrans
        $json = $request->getContent();
        $notification = json_decode($json);
        dd($notification);  

        // Ambil data notifikasi
        $transactionStatus = $notification->transaction_status;
        $orderId = $notification->order_id;

        // Ekstrak ID transaksi dari order_id
        $transactionId = explode('-', $orderId)[1];

        // Periksa transaksi di database
        $transaction = TransactionHistory::find($transactionId);

        

        if (!$transaction) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Perbarui status pembayaran berdasarkan status Midtrans
        $statusPembayaran = 'belum dibayar';

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $statusPembayaran = 'sudah dibayar';
        } elseif ($transactionStatus == 'pending') {
            $statusPembayaran = 'belum dibayar';
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            $statusPembayaran = 'gagal';
        }

        // Simpan status pembayaran ke database
        $transaction->update(['status_pembayaran' => $statusPembayaran]);

        return response()->json(['message' => 'Notifikasi berhasil diproses']);
    }
}
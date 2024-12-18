<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use PDF;

class transaksiAdmin extends Controller
{
    // Menampilkan semua transaksi dengan filter
    public function index(Request $request)
    {
        $query = TransactionHistory::query();

        // Filter berdasarkan tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Filter berdasarkan user_id
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Menampilkan data transaksi
        $transactions = $query->get();

        return view('admin.transaction_history.index', compact('transactions'));
    }

    // Fungsi untuk mencetak PDF
    public function printPDF(Request $request)
    {
        $query = TransactionHistory::query();

        // Filter berdasarkan tanggal
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Filter berdasarkan user_id
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Mendapatkan data transaksi
        $transactions = $query->get();

        // Menyiapkan data untuk PDF
        $pdf = PDF::loadView('admin.transaction_history.pdf', compact('transactions'));
        return $pdf->download('transaction_history.pdf');
    }

 

    public function show($id)
    {
        $transaction = DB::table('transaction_history')
        ->join('users', 'transaction_history.user_id', '=', 'users.id')
        ->join('products', 'transaction_history.id', '=', 'products.id')
        ->where('transaction_history.id', $id)
        ->select(
            'transaction_history.*',
            'users.username',
            'products.name_product',
            'products.price'
        )
        ->first();

    if (!$transaction) {
        abort(404, 'Transaction not found');
    }

    return view('admin.transaction_history.show', compact('transaction'));

}
}

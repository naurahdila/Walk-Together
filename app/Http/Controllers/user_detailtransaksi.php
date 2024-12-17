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


}

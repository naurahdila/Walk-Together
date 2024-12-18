<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionHistory;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    
    public function invoice($id)
    {
        $transaction = TransactionHistory::find($id);

        return view('user.invoice', ['transactions' => $transaction]);
    }


}

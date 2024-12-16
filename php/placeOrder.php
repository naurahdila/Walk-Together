<?php
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

//SAMPLE REQUEST START HERE

require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php'; 

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-LsXUHP_sNBfC19yw6CjzcNg0';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = [
    'transaction_details' => [
        'order_id' => $transaction->order_id,
        'gross_amount' => (int) $transaction->product_price,
    ],
    'customer_details' => [
        'first_name' => $transaction->name,
        'email' => $transaction->email,
        'phone' => $transaction->phone,
    ],
];

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo json_encode(['snap_token' => $snapToken]);
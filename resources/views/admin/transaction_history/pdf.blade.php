<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History PDF</title>
</head>
<body>
    <h1>Transaction History</h1>

    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>User ID</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->transaction_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .container {
      background-color: #ffffff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 50px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    h1 {
      text-align: center;
      font-size: 32px;
      color: #333;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      margin-bottom: 30px;
      border-collapse: collapse;
    }

    th {
      background-color: #007bff;
      color: white;
      padding: 12px 15px;
      text-align: left;
      font-size: 16px;
    }

    td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      font-size: 15px;
    }

    .btn {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      margin-top: 20px;
    }

    .btn-primary {
      background-color: #007bff;
      color: white;
      border: none;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-secondary {
      background-color: #6c757d;
      color: white;
      border: none;
      cursor: pointer;
      margin-left: 10px;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
    }

    .footer {
      text-align: center;
      margin-top: 40px;
      color: #777;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1>Invoice</h1>

    <table>
      <tr>
        <th>ID Transaksi</th>
        <td>{{ $transactions->id }}</td>
      </tr>
      <tr>
        <th>Jenis Transaksi</th>
        <td>{{ $transactions->transaction_type }}</td>
      </tr>
      <tr>
        <th>Nama Produk</th>
        <td>{{ $transactions->product_name }}</td>
      </tr>
      <tr>
        <th>Harga Produk</th>
        <td>{{ $transactions->product_price }}</td>
      </tr>
      <tr>
        <th>Nama</th>
        <td>{{ $transactions->name }}</td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td>{{ $transactions->created_at }}</td>
      </tr>
      <tr>
        <th>Status Pembayaran</th>
        <td>{{ $transactions->status_pembayaran }}</td>
      </tr>
    </table>

    <div class="d-flex justify-content-between">
      <button class="btn btn-primary" onclick="window.print()">Cetak Invoice</button>
      <a href="/" class="btn btn-secondary">Kembali</a>
    </div>
  </div>

  <div class="footer">
    <p>Terima kasih telah berbelanja bersama kami!</p>
  </div>

</body>

</html>

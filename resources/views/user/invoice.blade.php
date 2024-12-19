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
      background-color: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    .container {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      margin: 40px auto;
      max-width: 900px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 2.5rem;
      font-weight: bold;
      color: #333;
    }

    .header p {
      font-size: 1rem;
      color: #666;
    }

    .table-custom th,
    .table-custom td {
      padding: 15px;
      text-align: left;
    }

    .table-custom th {
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
    }

    .table-custom td {
      border-bottom: 1px solid #eaeaea;
      font-size: 15px;
    }

    .table-custom .highlight {
      font-weight: bold;
      color: #007bff;
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #777;
    }

    .btn-group {
      text-align: center;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 25px;
      border-radius: 5px;
      font-size: 16px;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      color: white;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-secondary {
      background-color: #6c757d;
      border: none;
      color: white;
      margin-left: 10px;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
    }

    .badge {
      padding: 10px 15px;
      font-size: 14px;
      border-radius: 20px;
      font-weight: bold;
    }

    .badge-success {
      background-color: #28a745;
      color: white;
    }

    .badge-warning {
      background-color: #ffc107;
      color: black;
    }

    .badge-danger {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Invoice</h1>
      <p>Transaction Details</p>
    </div>

    <table class="table table-custom">
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
        <td class="highlight">{{ $transactions->product_name }}</td>
      </tr>
      <tr>
        <th>Harga Produk</th>
        <td>Rp {{ number_format($transactions->product_price, 0, ',', '.') }}</td>
      </tr>
      <tr>
        <th>Nama</th>
        <td>{{ $transactions->name }}</td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td>{{ $transactions->created_at->format('d M Y, H:i') }}</td>
      </tr>
      <tr>
        <th>Status Pembayaran</th>
        <td>
          <span class="badge 
            @if($transactions->status_pembayaran == 'dibayar') badge-success
            @elseif($transactions->status_pembayaran == 'Pending') badge-warning
            @elseif($transactions->status_pembayaran == 'Gagal') badge-danger
            @endif">
            {{ ucfirst($transactions->status_pembayaran) }}
          </span>
        </td>
      </tr>
    </table>

    <div class="btn-group">
      <a href="{{ route('admin.transaction_history.index') }}" class="btn btn-primary">Back</a>
      <a href="{{ route('admin.transaction_history.print', $transactions->id) }}" class="btn btn-secondary">Print</a>
    </div>

    <div class="footer">
      <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </div>
  </div>
</body>

</html>

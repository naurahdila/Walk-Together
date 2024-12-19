@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2 class="my-4">Transaction History</h2>

    <!-- Filter Form -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.transaction_history.index') }}" method="GET">
                <div class="row">
                    <!-- Filter berdasarkan tanggal -->
                    <div class="col-md-4">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    
                    <!-- Filter berdasarkan user_id -->
                    <div class="col-md-4">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" value="{{ request('user_id') }}">
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('admin.transaction_history.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Transaksi -->
    <table id="transactionHistoryTable" class="table table-bordered mt-4">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Jenis Transaksi</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->transaction_type }}</td>
                    <td>{{ $transaction->product_name }}</td>
                    <td>{{ number_format($transaction->product_price, 0, ',', '.') }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                    <td>
                        <span class="badge 
                            @if($transaction->status_pembayaran == 'dibayar') bg-success text-light 
                            @elseif($transaction->status_pembayaran == 'Pending') bg-warning text-dark 
                            @elseif($transaction->status_pembayaran == 'Gagal') bg-danger text-light 
                            @endif
                        ">
                            {{ $transaction->status_pembayaran }}
                        </span>
                    </td>
                    <td>
                        <!-- Tombol untuk melihat detail transaksi -->
                        <a href="{{ route('admin.transaction_history.show', $transaction->id) }}" class="btn btn-info btn-sm">Lihat Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol Cetak PDF -->
    <div class="text-end mt-4">
        <a href="{{ route('admin.transaction_history.print', ['user_id' => request('user_id'), 'start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-danger">Cetak PDF Seluruh Transaksi</a>
    </div>
</div>

<!-- DataTables Initialization Script -->
<script>
    $(document).ready(function() {
        $('#transactionHistoryTable').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

@endsection

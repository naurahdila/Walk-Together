<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h3>Detail Pembayaran</h3>
    <button id="pay-button">Bayar Sekarang</button>

    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    alert('Pembayaran berhasil!');
                    console.log(result);
                },
                onPending: function(result) {
                    alert('Pembayaran pending.');
                    console.log(result);
                },
                onError: function(result) {
                    alert('Pembayaran gagal!');
                    console.log(result);
                }
            });
        });
    </script>
</body>
</html>

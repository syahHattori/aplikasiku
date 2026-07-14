<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scan Data Produk (Cart)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Mesin Kasir / Scan Keranjang</h2>
    <input type="text" id="barcodeInput" class="form-control mb-3" placeholder="Arahkan Scanner / Ketik SKU lalu Enter" autofocus>
    <table class="table table-bordered">
        <thead><tr><th>Nama</th><th>SKU</th><th>Harga</th></tr></thead>
        <tbody id="cartTableBody"></tbody>
    </table>
    <script>
        document.getElementById('barcodeInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                fetch('/scan-produk', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ code: this.value.trim() })
                }).then(res => res.json()).then(data => {
                    if (data.success) {
                        document.getElementById('cartTableBody').innerHTML += `<tr><td>${data.product.name}</td><td>${data.product.sku}</td><td>Rp${data.product.price}</td></tr>`;
                    } else { alert(data.message); }
                });
                this.value = '';
            }
        });
    </script>
</body>
</html>

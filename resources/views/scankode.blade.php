<!DOCTYPE html>
<html lang="en">
<head>
    <title>Barcode Scan Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/html5-qrcode"></script>
</head>
<body class="container mt-5">
    <h1>Scan Barcode/QR Code</h1>
    <div class="row">
        <div class="col-md-6"><div id="reader" style="width: 100%;"></div></div>
        <div class="col-md-6">
            <p>Product Code: <strong id="code"></strong></p>
            <div id="result" class="mt-3"></div>
        </div>
    </div>
    <script>
        function onScanSuccess(decodedText) {
            fetch('/scan', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ code: decodedText })
            }).then(res => res.json()).then(data => {
                document.getElementById('code').innerText = data.code;
                if(data.success) {
                    document.getElementById('result').innerHTML = `<p>Nama: ${data.product.name}</p><p>Harga: Rp${data.product.price}</p>`;
                } else {
                    document.getElementById('result').innerHTML = `<p class="text-danger">${data.message}</p>`;
                }
            });
        }
        let html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Mengalihkan ke WhatsApp...</title>
    <script>
        window.onload = function() {
            // Buka tab baru ke WhatsApp
            window.open(@json($waUrl), '_blank');

            // Redirect balik setelah 2 detik
            setTimeout(() => {
                window.location.href = @json($redirectUrl);
            }, 2000);
        }
    </script>
</head>
<body>
    <p>Mengalihkan ke WhatsApp... Tunggu sebentar.</p>
</body>
</html>
